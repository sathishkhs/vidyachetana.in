<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templates_Model extends CI_Model {

    private $table;
    public $primary_key;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset() {
        $this->primary_key = array();
        $this->data = array();
    }
    private function reset_pk() {
        $this->primary_key = array();
    }
    
    private function reset_data() {
        $this->data = array();
    }
    

    public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }

    public function get_template_path($template_id) {
        $this->db->where(array('template_id' => $template_id));
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->template_path;
    }

}
