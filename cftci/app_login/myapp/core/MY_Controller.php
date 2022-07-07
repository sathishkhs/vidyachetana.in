<?php
class MY_Controller extends CI_Controller{

    public $preview = "";

    public function __construct()
    {
        parent::__construct();

        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('admin_users_model');
        $this->load->model('master_model');

        // $settings = $this->master_model->settings('settings');
        // $this->session->set_userdata((array)$settings);

        $user_id = $this->session->userdata('user_id');

        if ($user_id > 0) {
            $this->data['role_id'] = $this->session->userdata('role_id');
            $this->data['is_admin'] = false;
            if ($this->session->userdata('role_id') == 1) {
                $this->data['is_admin'] = true;
            }
            $settings = (array)$this->master_model->settings('settings'); 
            $set = [];
            foreach ($settings as $setting) {
                $this->data['settings'][$setting->setting_key] = $setting->setting_value;
            }
            $this->data['user_data'] = array();
        }
    }

    public function sendemail($email, $emailtemplate)
    {

        $this->load->library('email');
        $setting_val = $this->settings_model->view_setting();
        if (isset($setting_val->SMTP_HOSTNAME) && !empty($setting_val->SMTP_HOSTNAME)) {
            $config['smtp_host'] = $setting_val->SMTP_HOSTNAME;
            $config['smtp_port'] = $setting_val->SMTP_PORT;
            $config['smtp_user'] = $setting_val->SMTP_USERNAME;
            $config['smtp_pass'] = $setting_val->SMTP_PASSWORD;
        } else {
            $config['smtp_host']    = 'smtp-relay.sendinblue.com';
            $config['smtp_port']    = '587';
            $config['smtp_user']    = 'sathishds94@gmail.com';
            $config['smtp_pass']    = 'xsmtpsib-1ec99089f766d4a74c443386545f640fafb9cd64b0d09ad9e4e9165add73a4c4-ZxMPTAy6SdcJ4FNv';
        }
        $config['protocol']    = 'smtp';
        $config['smtp_timeout'] = '7';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $this->email->initialize($config);
        $this->email->subject($emailtemplate->template_title);
        $mail_list = array($email);
        $this->email->to($mail_list);
        $this->email->cc($emailtemplate->cc);
        $this->email->bcc($emailtemplate->bcc);
        $this->email->from($emailtemplate->from, "Mtix360");
        if (isset($emailtemplate->invoice_name) && $emailtemplate->invoice_name) {
            $this->email->attach(INVOICE_PATH . $emailtemplate->invoice_name);
        }
        $emailmsg = $emailtemplate->template_content;
        $this->email->message($emailmsg);

        $return = $this->email->send();

        return true;
    }
}
?>