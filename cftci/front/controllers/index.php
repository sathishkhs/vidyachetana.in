<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends My_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('index_model');
    }
    public function index($slug = 'home') {
        $data = $this->data;
       
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/home', $data);
    }
}
?>