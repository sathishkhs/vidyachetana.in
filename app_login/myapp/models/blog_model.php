<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model {

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
    public function get_pagination($table){
        $this->db->select('*');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        return $q;

    }
    public function get_pagination_data($table){
        
        $this->db->select('*, sd.customer_type as role');
        $this->db->where($this->primary_key);
        $this->db->from($table.' as sd');
        if(!empty($this->input->post('customer_type')) && $this->input->post('customer_type') != '') // if datatable send POST for search
        {
            $this->db->where('sd.customer_type',$this->input->post('customer_type'));
        }
        $this->db->join('project as p', ' p.project_id = sd.project_id', 'left');
        $q = $this->db->get();
        return $q;

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

public function get_slug($key, $field, $lang_id = 1) {
    //creating slug code here
    $slug = preg_replace('~[^\\pL\d]+~u', '-', $key); // replace non letter or digits by
    $slug = trim($slug, '-'); // trim
    $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug); // transliterate
    $slug = strtolower($slug); // lowercase
    $slug = preg_replace('~[^-\w]+~', '', $slug); // remove unwanted characters

    if (!empty($slug)) {
        $this->db->select('count(*) as counter');
        $this->db->like($field, $slug, 'after');
        $query = $this->db->get('pages');
        $counter = $query->row()->counter;
        $slug = (!empty($counter)) ? $slug . '-' . (++$counter) : $slug;
    }

    return $slug;
}
}