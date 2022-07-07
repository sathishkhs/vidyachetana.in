<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faqs_model extends CI_Model {

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
		
	public function view() {
        $query = $this->db->select('*')
        				  ->from($this->table)
        				  ->get();						  
        return $query->result();
    }
	
	public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db
        			  ->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
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
	
	public function delete(){
		$this->db->where($this->primary_key);
		$this->db->delete($this->table);
		$this->reset_pk();
		return true;
	}
	
	public function get_categories(){
		$query = $this->db->select('faq_category_id, category_name')
						  ->get('faq_category');
		return $query->result();
    }
    public function get_pagination($table){
        $this->db->select('*');
        $q = $this->db->get($table);
        return $q;

    }

}
