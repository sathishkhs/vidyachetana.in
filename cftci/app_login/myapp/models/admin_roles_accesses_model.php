<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Roles_Accesses_Model extends CI_Model {

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

    public function view($role_id = 1) {
        $this->db->where('role_id', $role_id);
        $query = $this->db->get($this->table);
	//echo "<pre>";print_r($query);die();
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
    public function get_role_access($role_id, $parent_menuitem_id = NULL) {
        if (empty($parent_menuitem_id)) {
            $this->db->where('am.parent_menuitem_id IS NULL ');
            $this->db->where('ua.role_id', $role_id);
			$this->db->where('am.status_ind', 1);
            $this->db->from('admin_menuitems as am');
            $this->db->join('admin_roles_accesses as ua', 'am.menuitem_id = ua.menuitem_id', 'left');
        } else {
            $this->db->where('am.parent_menuitem_id', $parent_menuitem_id);
            $this->db->where('ua.role_id', $role_id);
            $this->db->from('admin_menuitems as am');
			$this->db->where('am.status_ind', 1);
            $this->db->join('admin_roles_accesses as ua', 'am.menuitem_id = ua.menuitem_id', 'left');
        }
		$this->db->order_by("display_order", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $tmpresult = $query->result();
            for ($i = 0; $i < count($tmpresult); $i++) {
                $tmpresult[$i]->submenus = $this->get_role_access($role_id, $tmpresult[$i]->menuitem_id);
            }
            return $tmpresult;
        } else {
            return;
        }
    }
}