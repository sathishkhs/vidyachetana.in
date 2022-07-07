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
        $this->db->order_by('i.display_order ASC, i.last_modified_date DESC');
        //$this->db->where('i.status_ind', 1);
        $this->db->select('i.*,m.menu_name');
        $this->db->from($this->table . ' as i');
        $this->db->join('menus as m', 'i.menu_id = m.menu_id', 'left');
        $this->db->order_by('m.menu_name,i.display_order,i.menuitem_text');
        $query = $this->db->get();
        return $query->result();
    }

    public function menu_view() {

        $this->db->where('parent_menuitem_id IS NULL');
        //$this->db->where('status_ind', 1);
        $this->db->where('menu_id', '2');
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function submenu_view($menu_id, $lang_id = 1) {
        $this->db->where('parent_menuitem_id IS NOT NULL');
        $this->db->where('parent_menuitem_id', $menu_id);
        $this->db->where('lang_id', $lang_id);
        //$this->db->where('status_ind', 1);
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function menu_view1($menu_id, $lang_id = 1) {
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('menu_id', $menu_id);
        $this->db->where('lang_id', $lang_id);
        //$this->db->where('status_ind', 1);
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_menuitems($menu_id, $parent_menuitem_id = null) {
        if (empty($parent_menuitem_id)) {
            $this->db->where('parent_menuitem_id IS NULL');
        } else {
            $this->db->where('parent_menuitem_id', $parent_menuitem_id);
        }
        $this->db->where('menu_id', $menu_id);
        //$this->db->where('status_ind', 1);
        $this->db->select('menuitem_id,menuitem_text');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    //this function for view main menu list in creating new page
    public function get_left_parent_menu() {
        $this->db->where('parent_menuitem_id', '0');
        $this->db->where('menu_id', '2');
        $this->db->where('status_ind', 1);
        $this->db->select('menuitem_id,menuitem_text');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        //$this->reset_data();
        return true;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        //$this->reset();
        return true;
    }
    
     public function update_parent_menu($menuitem_id, $lang_id = 1) {
        //$this->db->update($this->table, $this->data, $this->primary_key);
        $this->db->query("UPDATE  `menuitems` SET  `parent_menuitem_id` = NULL WHERE  `menuitems`.`menuitem_id` =".$menuitem_id." AND `menuitems`.`lang_id` =".$lang_id."");
        $this->db->last_query();
        $this->reset_pk();
        return true;
        return true;
    }

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }

    public function delete_multiple($menuitem_ids, $lang_id = 1) {
        $menuitem_ids = implode(",", $menuitem_ids);
        $this->db->where("lang_id", $lang_id);
        $this->db->where("menuitem_id IN($menuitem_ids)");
        $this->db->delete($this->table);
        $this->reset_pk();
        return true;
    }

    public function copy_multiple($menuitem_ids, $lang_id_from, $copy_lang_id_to) {
        $menuitem_ids = implode(",", $menuitem_ids);
        $userid = $this->session->userdata('user_id');
        $this->db->query("REPLACE INTO `menuitems`(`menuitem_id`, `lang_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `http_protocol`,`status_ind`, `created_date`, `created_by`, `modified_by`)
                          SELECT `menuitem_id`, $copy_lang_id_to as `lang_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `http_protocol`,`status_ind`, `created_date`, `created_by`, $userid as `modified_by` FROM `menuitems` WHERE menuitem_id IN($menuitem_ids) and `lang_id` = $lang_id_from");
        $this->db->last_query();
        $this->reset_pk();
        return true;
    }

}