<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_Model extends CI_Model {

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

    public function get_donation_page() {
        $type_id = 5;
        $this->db->where('type_id', $type_id);
        $this->db->select('page_id,page_title,page_slug');
        $this->db->from($this->table);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result();
    }

    public function get_row($preview = "") {
        if ($preview != "yes") {
            $this->db->where('status_ind', '1');
        }
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        //echo $this->db->last_query(); exit;
        return $row;
    }
   
    public function view_data($table){
        
        $this->db->select('*');
        if(!empty($this->primary_key)){
        $this->db->where($this->primary_key);
        }
        $this->db->where('status_ind', '1');
        $q = $this->db->get($table);
        $result = $q->result();
        $this->reset_pk();
        return $result;
    }

    public function get_widgetcontent() {
        $this->db->where($this->primary_key);
        $this->db->where('p.status_ind', '1');
        $this->db->select('p.page_id,p.page_title,p.page_path,p.alt_title,p.page_slug,p.page_content,p.page_short_description,p.nofollow_ind');
        $this->db->from($this->table . ' as p');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
 
}
