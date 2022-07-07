<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends MY_Controller {
        public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
       
    }

    public function index($slug) {
    $template_path = $this->pagewisecontent($slug);
    $data = $this->data;
    $data['page_heading'] = $data['page_items']->page_title;
    $data['breadcrumb'] = '<span><a href="">Home</a> - </span>'.$data['page_items']->page_title ;
    $data['scripts'] = array('front/javascripts/index.js','front/javascripts/'.$slug.'.js');
    // $data['breadcrumb'] = $data['page_items']->page_title;
    $this->load->view($template_path, $data);
    }
}