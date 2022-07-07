<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require_once 'vendor/autoload.php';
class Seva_Page extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
       
      
       
        // $this->load->model('master_model');
    }

   
    public function index($slug) {
        
        $template_path = $this->sevaspagewisecontent($slug);
        $data = $this->data;
        $data['page_heading'] = 'Seva Page';
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span> <span><a href="'.$this->class_name .'">'.ucfirst($this->class_name).'</a> - </span>Seva Page';
        $data['scripts'] = array('assets/javascripts/seva_page.js');
        $this->load->view($template_path, $data);
    
    }

    public function save_donation(){
        $this->seva_page_model->data['full_name'] = $full_name = $this->input->post('full_name');
        $this->seva_page_model->data['phone_number'] = $phone_number = $this->input->post('phone_number');
        $this->seva_page_model->data['email'] = $email = $this->input->post('email');
        $this->seva_page_model->data['pan_number'] = $pan_number = $this->input->post('pan_number');
        $this->seva_page_model->data['city'] = $city = $this->input->post('city');
        $this->seva_page_model->data['amount'] = $amount = $this->input->post('amount');
        $this->seva_page_model->data['seva_name'] = $seva_name = $this->input->post('seva_name');
        
        $response = json_decode($this->instamojo_Authentication());
        $this->seva_page_model->data['access_token'] = $seva_name = $this->input->post('access_token');
      
     
    //   print_R($response->access_token);exit;
      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$response->access_token.''));

        $payload = Array(
            'purpose' => $seva_name,
            'amount' => $amount,
            'buyer_name' => $full_name,
            'email' => $email,
            'phone' => $phone_number,
            'redirect_url' => "http://6ae0-2405-201-c035-b0be-3413-a62-6151-4aca.ngrok.io/neat_ci/seva_page/thank_you/$response->access_token/",
            'send_email' => 'True',
            'send_sms' => 'True',
            'webhook' => ' http://6ae0-2405-201-c035-b0be-3413-a62-6151-4aca.ngrok.io/neat_ci/seva_page/webhook',
            'allow_repeated_payments' => 'False',
        );
    
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $create_payment_request = curl_exec($ch);
        curl_close($ch);  
        $payment_request = json_decode($create_payment_request);
        if($this->seva_page_model->insert('seva_offerings')){
            header("Location: $payment_request->longurl");
            exit;
        }
      
        

    }


    public function instamojo_Authentication(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/oauth2/token/');     
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $payload = Array(
            'grant_type' => 'client_credentials',
            'client_id' => INSTAMOO_CLIENT_ID,
            'client_secret' => INSTAMOO_SECRET_KEY
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        return $response;
    }

    public function thank_you($access_token){
        $this->seva_page_model->data['payment_id'] = $payment_id = $this->input->get('payment_id');
        $this->seva_page_model->data['payment_status'] = $payment_status = $this->input->get('payment_status');
        $this->seva_page_model->data['payment_request_id'] = $payment_request_id = $this->input->get('payment_request_id');
        $this->seva_page_model->primary_key = array('access_token'=>$access_token);
        print_R($access_token);
        }
}