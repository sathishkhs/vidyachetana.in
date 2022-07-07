<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menuitems_Model extends CI_Model {

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
    

    public function get_max_value($field, $lang_id = 1) {
        $this->db->select_max($field);
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->$field;
    }

    public function get_row() {
        $this->db->order_by('menu_id', 'desc');
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function header_sub_menu() {
        $this->db->order_by('display_order');
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('status_ind', '1');
        $this->db->where('menu_id', 1);
        //$this->db->limit('8');
        $query = $this->db->get($this->table);
     
        return $query->result();
    }
    public function side_menu($menuitem_id) {
        $this->db->where('m.menuitem_id', $menuitem_id);
        $this->db->select('m.*');
        $this->db->from($this->table . ' as m');
        $query = $this->db->get();
        return $query->result();
    }
    public function view_submenu($menu_id) {
        $this->db->order_by('display_order');
        $this->db->where('parent_menuitem_id IS NOT NULL');
        $this->db->where('status_ind', '1');
        $this->db->where('parent_menuitem_id', $menu_id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function view($menu_id, $lang_id = 1) {
        $this->db->order_by('display_order');
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('status_ind', '1');
        $this->db->where('menu_id', $menu_id);
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_menuitems($menu_id, $lang_id = 1, $parent_menuitem_id = null) {        
        if (empty($parent_menuitem_id)) {
            $this->db->where('parent_menuitem_id IS NULL');
        } else {
            $this->db->where('parent_menuitem_id', $parent_menuitem_id);
        }
        $this->db->order_by('display_order');
        $this->db->where('status_ind','1');
        // $this->db->where('lang_id', $lang_id);
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get($this->table);
		//echo $this->db->last_query();
        return $query->result();
    }
    
   
   
}
