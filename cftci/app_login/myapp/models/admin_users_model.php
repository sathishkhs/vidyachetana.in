<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Users_Model extends CI_Model {

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
    public function get_rowdata($table) {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function get_viewdata($table){
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $result = $query->result();
        $this->reset_pk();
        return $result;
    }
    public function session_id() {
        $this->db->where($this->primary_key);
        $this->db->where('status_ind', '1');
        $query = $this->db->get($this->table);
        $row = $query->row();
        if (!empty($row->user_session_id)) {
            return $row->user_session_id;
        } else {
            return false;
        }
    }

    public function view() {
        $this->db->order_by('modified_date DESC');
        // $this->db->where('user_id >', '1');
        // $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }
    public function insert_data($table) {
        $this->db->insert($table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update_data($table) {
        $this->db->update($table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }

    public function login($data) {
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row;
    }

    public function is_exist($data) {
        $this->db->where('email', $data['email']);
        $this->db->where('status_ind', '1');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row;
    }

    public function check_duplicate($field_name, $field_value, $user_id) {
        $this->db->where($field_name, $field_value);
        if (!empty($user_id)) {
            $this->db->where('user_id !=', $user_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
    public function get_pagination($table){
        $this->db->select('*');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q;

    }
}
