<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Users_Accesses_Model extends CI_Model {

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

    public function get_user_access($user_id, $parent_menuitem_id = NULL) {
        $sql = "";
        $status = $this->db->where('status_ind',1)->where('user_id',$user_id)->get('admin_users')->row();
        if(!empty($status)){
        if (empty($parent_menuitem_id)) {
            $sql = "SELECT * FROM admin_menuitems WHERE parent_menuitem_id IS NULL AND menuitem_id IN (SELECT menuitem_id FROM admin_users_accesses WHERE user_id=$user_id) AND status_ind=1 ORDER BY display_order";
        } else {
            $sql = "SELECT * FROM admin_menuitems WHERE parent_menuitem_id=$parent_menuitem_id AND menuitem_id IN (SELECT menuitem_id FROM admin_users_accesses WHERE user_id=$user_id) AND status_ind=1 ORDER BY display_order";
        }
        $query = $this->db->query($sql); 
	//echo "<pre>"; print_r($query);echo "<br/>";
        if ($query->num_rows() > 0) {
            $tmpresult = $query->result();
            for ($i = 0; $i < count($tmpresult); $i++) {
                $tmpresult[$i]->submenus = $this->get_user_access($user_id, $tmpresult[$i]->menuitem_id);
            }
           
            return $tmpresult;
        } else {
         
            return;
        }
    }else{
        return false;
    }
    }

    public function is_allowed($user_id, $menuitem_id) {
        $sql = "SELECT menuitem_id FROM admin_users_accesses WHERE user_id=$user_id AND menuitem_id=$menuitem_id";
		//echo $sql;exit;
        $query = $this->db->query($sql);
		//echo "<pre>"; print_r($query);die();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function view($user_id = 1) {
        $this->db->where('user_id', $user_id);
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

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }
    public function get_permisions($user_id, $menu_id) {
        $this->db->select('add_permission,edit_permission,delete_permission');
        $this->db->where('user_id', $user_id);
        $this->db->where('menuitem_id', $menu_id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

}