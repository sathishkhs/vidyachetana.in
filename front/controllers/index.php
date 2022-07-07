<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('index_model');
        $this->load->model('custom_page_model');
    }
    public function index($slug = 'home') {
         $template_path = $this->pagewisecontent($slug);
    $data = $this->data;
        $data['gallery'] = $this->custom_page_model->get_gallery_data('gallery');
        $data['scripts'] = array('assets/javascripts/index.js');
        // $this->load->view('templates/home', $data);
        $this->load->view($template_path, $data);
    }

    public function contact_us(){
        $data = $this->data;
        $data['view'] = 'index/contact_us';
        $data['scripts'] = array('assets/javascripts/index.js'); 
        $this->load->view('templates/home', $data);
    }
}
?>