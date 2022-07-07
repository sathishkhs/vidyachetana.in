<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
    }

    public function getslug($model, $field, $text) {///
        $this->load->model($model);
        $slug = $this->$model->get_slug(urldecode($text), $field, $this->session->userdata('lang_id'));
        $result = array("field_id" => $field, "field_val" => $slug);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */
