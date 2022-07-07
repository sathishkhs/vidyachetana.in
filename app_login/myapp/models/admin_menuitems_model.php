<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Menuitems_Model extends CI_Model {

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
    
    public function is_exist() {
        $this->db->where($this->primary_key);
        $this->db->select('COUNT(*) as counter');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->counter;
    }
    
    public function view() {
        $this->db->where('status_ind', 1);
        $query = $this->db->select('*')->from($this->table)->get();
        return $query->result();
    }
    public function view_access_menuitems($role_id) {
        //$this->db->where('i.status_ind', 1);
        $this->db->select('am.*');
        $this->db->from('admin_menuitems as am');
        $this->db->where('ar.role_id',$role_id);
        $this->db->join('admin_roles_accesses as ar', 'ar.menuitem_id = am.menuitem_id', 'left');
        $query = $this->db->get();
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

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }

}

/*
***************** Sample Calling (from controller) *****************
//Loading the model
$this->load->model('admin_menuitems');

//Calling view method of the model
$this->admin_menuitems->list();

//Calling get_max_value method of the model
$this->admin_menuitems->get_max_value('menuitem_id',1);

//Calling insert method of the model
$this->admin_menuitems->data = $this->input->post();
$this->admin_menuitems->insert();

//Calling insert update of the model
$this->admin_menuitems->data = $this->input->post();
$this->admin_menuitems->primary_key = array('menuitem_id'=>$this->input->post('menuitem_id'), 'lang_id'=>$this->input->post('lang_id'));
$this->admin_menuitems->update();

//Calling delete method of the model
$this->admin_menuitems->primary_key = array('menuitem_id'=>$this->input->post('menuitem_id'), 'lang_id'=>$this->input->post('lang_id'));
$this->admin_menuitems->delete();

************* End of Sample Calling **************
*/