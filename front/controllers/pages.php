<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends MY_Controller {
        public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        // $this->load->model('doctors_model');
    }

    public function index($slug) {
    $template_path = $this->pagewisecontent($slug);
    $data = $this->data;
    $data['page_heading'] = $data['page_items']->page_title;
    $data['breadcrumb'] = '<li><a href="">Home</a></li><li class="color-thm-gray">/</li><li><span>'.$data['page_items']->page_title.'</span></li>' ;   
    $data['scripts'] = array('assets/javascripts/index.js','assets/javascripts/'.$slug.'.js');
    // $data['breadcrumb'] = $data['page_items']->page_title;
    $this->load->view($template_path, $data);

    }
}