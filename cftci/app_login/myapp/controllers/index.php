<?php



if (!defined('BASEPATH'))

exit('No direct script access allowed');



class Index extends MY_Controller {



    public function __construct() {

        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('admin_roles_accesses_model');
        // $this->load->model('email_templates_model');

    }
    public function index() {

        $msg = array();
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run()) {

            $login_status = (array) $this->admin_users_model->login($this->input->post());
            if (count($login_status) == 0) {
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-1', 'txt' => 'Invalid Username and Password!');
                $this->session->set_flashdata('msg', $msg);
                redirect('');
            } else {
                $login_status['lang_id'] = 1;
                $this->session->set_userdata($login_status);
                $side_menu_users = $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($this->session->userdata('role_id'));

                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;

                $member = $this->input->post('remember');
                if (!empty($member)) {
                    $this->input->set_cookie('username', $this->input->post('username'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                    $this->input->set_cookie('password', $this->input->post('password'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                }
                redirect('index/dashboard');
            }
        }else{

            print_r(validation_errors());
        }

        $data['view'] = 'index/index';
        $data['title'] = 'Login Page';
        $data['breadcrumb'] = 'Login Page';
        $data['scripts'] = array('');
        $this->load->view('templates/default', $data);
    }

    public function register(){

         // If registration request is submitted

            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('username', 'User Name', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'first_name' => strip_tags($this->input->post('first_name')),
                'last_name' => strip_tags($this->input->post('last_name')),
                'email' => strip_tags($this->input->post('email')),
                'username' => strip_tags($this->input->post('username')),
                'password' => md5($this->input->post('password')),
                'mobile_number' => $this->input->post('mobile_number'),
                'role_id' => $this->input->post('role_id'),
                'created_date' => date('Y-m-d h:i:s'),
                'status_ind'=>0
            );

            if($this->form_validation->run() == true){
               $this->admin_users_model->data = $userData;
                $insert = $this->admin_users_model->insert();
                if($insert){
                    $this->admin_users_model->primary_key = array('username'=>$this->input->post('username'),'password'=>md5($this->input->post('password')));
                    $login_status = (array) $this->admin_users_model->get_row();
                    if (!empty($login_status) && count($login_status) > 0) {
                        $login_status['lang_id'] = 1;
                        $this->session->set_userdata($login_status);
                        $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
                        $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            if(isset($_SESSION['sidebar_menuitems']) && !empty($_SESSION['sidebar_menuitems'])){

            } else {
                //$side_menu_users = $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $side_menu_roles['sidebar_menuitems'] = $this->admin_roles_accesses_model->get_role_access($this->session->userdata('role_id'));
                $this->session->set_userdata($side_menu_roles);

                $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            }
                        redirect('');
                    }

                }else{
                    $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Some problems occured, please try again.');
                    $this->session->set_flashdata('msg', $msg);
                    redirect('index/register');
                }
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Please fill all the mandatory fields.');

            }
        $data['roles'] = $this->admin_roles_model->view();
        $data['view'] = 'index/register';
        $data['title'] = 'Register Page ';
        $data['scripts'] = array('');
        $this->load->view('templates/default', $data);

    }


public function check_username(){
    $username = $this->input->post('username');
    $this->admin_users_model->primary_key = array('username'=>$username);
    $result = $this->admin_users_model->get_row();
    if( !empty($result)){
        $data = 0;
    }else{
        $data = 1;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}
public function check_email(){
    $email = $this->input->post('email');
    $this->admin_users_model->primary_key = array('email'=>$email);
    $result = $this->admin_users_model->get_row();
    if( !empty($result)){
        $data = 0;
    }else{
        $data = 1;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}


    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }else{
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            if(isset($_SESSION['sidebar_menuitems']) && !empty($_SESSION['sidebar_menuitems'])){

            } else {
                //$side_menu_users = $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $side_menu_roles['sidebar_menuitems'] = $this->admin_roles_accesses_model->get_role_access($this->session->userdata('role_id'));
                $this->session->set_userdata($side_menu_roles);

                $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            }
        }

        $data['view'] = 'index/dashboard';
        $data['title'] = 'Administrator Dashboard ';
        $data['breadcrumb'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Welcome to Administrative Panel';
        $data['scripts'] = array('js/demo/chart-area-demo.js','js/demo/chart-pie-demo.js');
        $this->load->view('templates/dashboard', $data);

    }



    public function forgotpassword() {
        $msg = array();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run()) {
            $valid_email = $this->admin_users_model->is_exist($this->input->post());
            if (count($valid_email) == 0) {
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Invalid email! Please try again.');
            } else {
                $new_password = random_string('alnum', 8);
                $this->admin_users_model->data = array('password' => $new_password);
                $this->admin_users_model->primary_key = array('user_id' => $valid_email->user_id);
                if ($this->admin_users_model->update()) {
                //IMP to add this two line for sending html email
                    $email_setting = array('mailtype' => 'html');
                    $this->email->initialize($email_setting);
                    //IMP
                    $this->email->to($valid_email->email);
                    $this->email->from('admin@admin.com');
                    //$this->email->subject('Password Reminder');

                    $this->email_templates_model->primary_key = array('template_id' => 3);
                    $emailtemplate = $this->email_templates_model->get_row();
                    $this->email->subject($emailtemplate->template_title);
                    $emailmsg = $emailtemplate->template_content;
                    $emailmsg = str_replace('##USERNAME##', $valid_email->username, $emailmsg);
                    $emailmsg = str_replace('##PASSWORD##', $new_password, $emailmsg);
                    $emailmsg = str_replace('##LOGIN_LINK##', base_url(), $emailmsg);
                    $this->email->message($emailmsg);
                    if ($this->email->send()) {
                        $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Password sent to your email.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to send email.');
                    }
                }
            }

            $this->session->set_flashdata('msg', $msg);
            redirect('forgot-password');
        }

        $data['view'] = 'index/forgot_password';
        $data['title'] = 'Admin Forgot Password ';
        $data['page_heading'] = 'Admin Forgot Password';
        $data['scripts'] = array('js/index.js');
        $this->load->view('templates/default', $data);
    }

    public function profile()
    {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }
        $msg = array();
        $this->admin_users_model->primary_key = array('user_id'=>$user_id);
        $data['profile'] = $this->admin_users_model->get_rowdata('admin_users');
        $this->admin_users_model->primary_key = array('role_id'=>$this->session->userdata('role_id'));
        $data['role'] = $this->admin_users_model->get_rowdata('admin_roles');
        $data['view'] = 'index/profile';
        $data['title'] = 'Administrator Dashboard ';
        $data['breadcrumb'] = 'My Profile';
        $data['page_heading'] = 'Edit Account Information';
        $data['scripts'] = array('assets/javascripts/adminusers.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save_profile(){
        $user_id = $this->input->post('user_id');
		$this->admin_users_model->data = $this->input->post();

		$this->profile_pic = array('upload_path' => PROFILE_PIC_PATH, 'allowed_types' => 'png|gif|jpg|jpeg');
		$this->upload->initialize($this->profile_pic);
		if (!empty($_FILES['profile_pic']['name']) && $this->upload->do_upload('profile_pic')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "profile_pic" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->admin_users_model->data['profile_pic'] = $gen_filename;
            $this->admin_users_model->primary_key = array('user_id'=>$user_id);
            $profile_pic = $this->admin_users_model->get_rowdata('admin_users')->profile_pic;
            if(file_exists(PROFILE_PIC_PATH.$profile_pic)){
            unlink(PROFILE_PIC_PATH.$profile_pic);
            }
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
            print_R($this->upload->display_errors());exit;
			$profile_pic_err = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down', 'txt' => $this->upload->display_errors());
            $this->session->set_flashdata('profile_pic_err', $profile_pic_err);
		}
		//Image Upload Code end here
		if (!empty($user_id)) {
			$this->admin_users_model->data['modified_date'] = date('Y-m-d h:i:s');
			$this->admin_users_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->admin_users_model->primary_key = array('user_id' => $user_id);
			if ($this->admin_users_model->update_data('admin_users')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}

		}

		$this->session->set_flashdata('msg', $msg);
		redirect("profile");
	}

    public function check_password(){
        $user_id = $this->session->userdata('user_id');
        $password = $this->input->post('password');
        $this->admin_users_model->primary_key = array('user_id'=>$user_id,'password' => md5($password));
        $res = $this->admin_users_model->get_rowdata('admin_users');
        if(!empty($res)){
            $data = 1;
        }else{
            $data = 0;
        }
        header('Content-Type: application/json');
        echo json_encode($data);


    }
    public function change_password(){
        $user_id = $this->session->userdata('user_id');
        if(!empty($this->input->post('new_password'))){
            if($_POST['new_password'] === $_POST['repeat_password']){
                $this->admin_users_model->data['password'] = md5($this->input->post('new_password'));
                $this->admin_users_model->primary_key = array('user_id'=>$user_id);
                if ($this->admin_users_model->update_data('admin_users')) {
                    $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Password Changed Successfully');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to change Password.');
                }
            }else{
                $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to change Password.');
            }
        }
        $this->session->set_flashdata('msg', $msg);
		redirect("profile");
    }

    public function logout() {
        $this->session->sess_destroy();
        session_destroy();
        redirect('');
    }



    public function changelanguage() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }else{
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            if(isset($_SESSION['sidebar_menuitems']) && !empty($_SESSION['sidebar_menuitems'])){

            } else {
                //$side_menu_users = $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $side_menu_roles['sidebar_menuitems'] = $this->admin_roles_accesses_model->get_role_access($this->session->userdata('role_id'));
                $this->session->set_userdata($side_menu_roles);

                $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            }
        }
        $redirect_page = $this->input->post('redirectPage');
        $default_language = array('lang_id' => $this->input->post('defaultLanguage'));
        $this->session->set_userdata($default_language);
        redirect($redirect_page);
    }

}