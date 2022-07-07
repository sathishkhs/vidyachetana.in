<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Widget_areas_model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

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
    

    public function get_max_value($field) {
        $this->db->select_max($field);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->$field;
    }

    public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }

    public function get_widget_areas($template_id) {
        $area_ids = array('7,8');
        $this->db->where_not_in('template_id', $area_ids);
        $this->db->where('template_id', $template_id);
        $query = $this->db->select('*')->from($this->table)->get();
        return $query->result();
    }

    public function view() {
        $query = $this->db->select('*')->from($this->table)->get();
        return $query->result();
    }

}
