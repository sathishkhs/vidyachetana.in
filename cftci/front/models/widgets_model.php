<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Widgets_Model extends CI_Model {

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

    public function get_row() {
        $this->db->where($this->primary_key);
        $this->db->order_by('w.display_order');
        $this->db->select('w.*,pt.widget_path');
        $this->db->from($this->table . ' as w');
        $this->db->join('page_types as pt', 'w.widget_type = pt.type_id', 'left');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function get_row_lang_id($widget_content_id) {
        $this->db->where('widget_content', $widget_content_id);
        $this->db->where('template_id', 1);
        $this->db->order_by('w.display_order');
        $this->db->select('w.*,pt.widget_path');
        $this->db->from($this->table . ' as w');
        $this->db->join('page_types as pt', 'w.widget_type = pt.type_id', 'left');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }

    public function view($template_id, $area_id) {
        $this->db->where('w.template_id', $template_id);
        $this->db->where('w.area_id', $area_id);
        $this->db->where('w.page_wise_widgets', '0');
        $this->db->where('w.status_ind',1);
        $this->db->order_by('w.display_order');
        $this->db->select('w.*,pt.widget_path');
        $this->db->from($this->table . ' as w');
        $this->db->join('page_types as pt', 'w.widget_type = pt.type_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function view_page_widgets($template_id, $area_id,$page_id="") {
        //$this->db->where('template_id', $template_id);
        $this->db->where('w.area_id', $area_id);
        $this->db->where('w.page_id', $page_id);
        $this->db->where('w.widget_type !=""');
        $this->db->where('w.page_wise_widgets', '1');
        $this->db->order_by('w.display_order');
        $this->db->select('w.*,pt.widget_path');
        $this->db->from($this->table . ' as w');
        $this->db->join('page_types as pt', 'w.widget_type = pt.type_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

}
