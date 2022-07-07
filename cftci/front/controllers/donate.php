<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'vendor/autoload.php';
// require(APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php');
// require_once 'vendor/dompdf/autoload.inc.php';
// print_r(get_included_files());exit;
use Razorpay\Api\Api;
class Donate extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->config->load('razorpay-config');
      
       
        $this->load->model('payment_model');
    }

  public function index($slug) {
        if(!empty($this->input->post())){
            $data = $this->data;

            $data['slug'] = $slug;
            $data['table_name'] = $table_name = $this->input->post('table_name');

            $data['keyId'] = $keyId = $this->config->item('keyId');

            $this->payment_model->data['full_name'] = $data['full_name'] = $full_name = $this->input->post('full_name');
            $this->payment_model->data['phone_number'] = $data['phone_number'] = $phone_number = $this->input->post('phone_number');
            $this->payment_model->data['email'] = $data['email'] = $email = $this->input->post('email');
            $this->payment_model->data['pan_number'] = $data['pan_number'] = $pan_number = $this->input->post('pan_number');
            $this->payment_model->data['city'] = $data['city'] = $city = $this->input->post('city');
            $this->payment_model->data['amount'] = $data['amount'] = $amount = $this->input->post('amount');
            $this->payment_model->data['payment_date'] = $data['payment_date'] = $payment_date = date('Y-m-d h:i:s');
            $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generated_key = substr(str_shuffle($str_result), 0, 4);
            $this->payment_model->data['receipt'] = $receipt = $generated_key . '_' . rand('00000000', '9999999999');
            $insert_id = $this->payment_model->insert($table_name);

            // print_r($insert_id);exit;
            $order_data = [
                'receipt'         => $receipt,
                'amount'          => $amount * 100, // 39900 rupees in paise
                'currency'        => 'INR',
                'notes'           => [
                    'name'  => $full_name,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'pan_number' => $pan_number,
                    'city' => $city,
                    'payment_date' => $payment_date,
                    'receipt' => $receipt,
                    'insert_id' => $insert_id
                ]

            ];
            $api = new Api($this->config->item('keyId'), $this->config->item('keySecret'));
            $razorpayOrder = $api->order->create($order_data);
            // print_r($razorpayOrder['created_at']);exit;

            $this->payment_model->data['razorpay_order_id'] = $data['razorpay_order_id'] = $razorpay_order_id = $razorpayOrder['id'];
            $this->payment_model->data['entity'] = $data['entity'] = $entity = $razorpayOrder['entity'];
            $this->payment_model->data['status'] = $data['status'] = $status = $razorpayOrder['status'];
            $this->payment_model->data['created_at'] = $data['created_at'] = $created_at = $razorpayOrder['created_at'];
            
            $this->payment_model->primary_key = array('id' => $insert_id);
            $this->payment_model->update($table_name);
            
            $data['insert_id'] = $insert_id;
            $data['view_path'] = $this->class_name . "/$slug";
            $data['scripts'] = array("assets/javascripts/$slug.js");
            $this->load->view('templates/inner_page', $data);


        }else{
        // $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        $data['view_path'] = $this->class_name . "/$slug"; 
        $data['page_heading'] = "Donate";
        $data['breadcrumb'] = '<b><a href="" class="thm-text">BACK TO HOME</a></b> ';
        $data['scripts'] = array("assets/javascripts/$slug.js");
        $this->load->view('templates/inner_page', $data);
        }
    
    }


   
    public function save_payment($insert_id, $table_name)
    {

        $this->payment_model->primary_key = array('id' => $insert_id);
        $payment_data = $this->payment_model->row_data($table_name);
        $this->payment_model->primary_key = array('id' => $insert_id);

        if (!empty($this->input->post('error'))) {
            $this->payment_model->data['error_code'] = $this->input->post('error')['code'];
            $this->payment_model->data['error_description'] = $this->input->post('error')['description'];
            $this->payment_model->data['reason'] = $this->input->post('error')['reason'];
            $this->payment_model->data['razorpay_payment_id'] = $razorpay_payment_id =  json_decode($this->input->post('error')['metadata'])->payment_id;
            $this->payment_model->data['status'] = 'failed';
        } else {
            $this->payment_model->data['razorpay_payment_id'] = $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $this->payment_model->data['status'] = 'success';
        }
        $this->payment_model->update($table_name);

        if (!empty($this->input->post('error'))) {
            $this->sendmail($payment_data->email, $payment_data->name, $payment_data->amount, $payment_data->razorpay_order_id, 0);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect($this->class_name . '/donation_failed/');
        } else {
            $this->sendmail($payment_data->email, $payment_data->name, $payment_data->amount, $payment_data->razorpay_order_id, 1);
            $this->session->set_flashdata('order_id', $razorpay_payment_id);
            $this->session->set_flashdata('razorpay_payment_id', $razorpay_payment_id);
            $this->session->set_flashdata('amount', $payment_data->amount);
            $this->session->set_flashdata('name', $payment_data->full_name);
            redirect($this->class_name . '/donation_success/');
        }
    }

    public function donation_success()
    {
        // if(empty($res) || empty($amount)){
        //     redirect('donate');
        // }
        $data = $this->data;
        $msg = array();
        $data['view_path'] = $this->class_name . '/donation_success';
        // $data['name'] = urldecode($res);
        // $data['amount'] = $amount;

        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/inner_page', $data);
    }
    public function donation_failed()
    {
        $msg = array();
        $data = $this->data;
        $data['view_path'] = $this->class_name . '/donation_failed';
        // $data['name'] = ucfirst($name);
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js', 'javascripts/dashboard.js');
        $this->load->view('templates/inner_page', $data);
    }

    public function sendmail($to_mail, $name, $amount,$receipt, $status)
    {
      

        $config['protocol']    = 'mail';
        $config['smtp_host']    = 'mail.a.org';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user']    = 'donations@a.org';
        $config['smtp_pass']    = '@123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        // $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $config['wordwrap'] = TRUE; // bool whether to validate email or not 

        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
        $this->email->from('donations@a.org', 'CFTI');
        $this->email->to($to_mail);

        if ($status == 1) {
            $this->payment_model->primary_key = array('template_id' => 1);
            $template = $this->payment_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;
            $message = str_replace('####NAME####', $name, $template->template_content);
             $message = str_replace('####RECEIPT####', $receipt, $message);
        } elseif ($status == 0) {
            $this->payment_model->primary_key = array('template_id' => 2);
            $template = $this->payment_model->row_data('email_templates');
            $data['name'] = $name;
            $data['amount'] = $amount;
            $this->email->subject($template->template_title);
            // $message = $template->template_content;

            $message = str_replace('####NAME####', $name, $template->template_content);
            $message = str_replace('####RECEIPT####', $receipt, $message);
            // $message = $this->load->view('email_templates/failed.php',$data,true);
        }


        $this->email->message($message);
       
        $q = $this->email->send();

       

    }

   
}