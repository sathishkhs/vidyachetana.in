<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonials_model extends CI_Model {

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
		
	public function view($table) {
        $query = $this->db->select('*')
        				  ->from($table)
        				  ->get();		
                        		  
        return $query->result();
    }
	
	public function get_row($table) {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }	
	public function get_rowdata($table) {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->result();
        $this->reset_pk();
        return $row;
    }	
	
	public function insert($table) {			
        $this->db->insert($table, $this->data);
		$this->reset_data();        
        return true;
    }
	
	public function update($table) {
		$this->db->update($table, $this->data, $this->primary_key);		
		$this->reset();
		return true;
	}
	
	public function delete($table){
		$this->db->where($this->primary_key);
		$this->db->delete($table);
		$this->reset_pk();
		return true;
    }
    
    public function get_pagination($table){
        $this->db->select('*');
        $q = $this->db->get($table);
        return $q;

    }
}