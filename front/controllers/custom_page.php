<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    require_once 'vendor/autoload.php';
class Custom_page extends MY_Controller {
    public $class_name;
    public $api;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('custom_page_model');
        
    }

    
    public function index($slug) {
        
        $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        if($slug == 'gallery'){
            $data['gallery'] = $this->custom_page_model->get_gallery_data('gallery');
        }
        $data['view_path'] = "custom/$slug"; 
        $data['page_heading'] = $data['page_items']->page_title;
        $data['breadcrumb'] = '<b><a href="" class="thm-text">BACK TO HOME</a></b> ';
        $data['scripts'] = array('assets/javascripts/custom_page.js');
        $this->load->view($template_path, $data);
    
    }
    
    public function corporate_giving_submit(){
        $this->custom_page_model->data = $this->input->post();
        $this->custom_page_model->data['created_date'] = date('Y-m-d');
        $res = $this->custom_page_model->insert('corporate_giving');
        if($res > 0){
            $output = 'Thank you, Your registration successful.';
        }else{
            $output = 'Failed to register';
        }
        
        echo json_encode($output);
    }
    
    
    public function csr_form(){
      
        $post = $this->input->post();
        if(!empty($post)){
            $this->custom_page_model->data = $post;
            $res = $this->custom_page_model->insert('csr_partners');
            $data = $res;
            if($res){
                $data = 1;
            }else{
                $data = 0;
            }
        }else{
            $data = 2;
        }

        echo json_encode($data);
    }
}