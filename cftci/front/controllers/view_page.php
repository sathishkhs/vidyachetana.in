<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_page extends MY_Controller {
    public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        // $this->load->model('master_model');
    }

   
    public function index($slug) {
        $data = $this->data;
        $data['view'] = "view_page/".$slug;
        $data['scripts'] = array("assets/javascripts/$slug.js");
        $this->load->view('templates/view_page', $data);
    }
}