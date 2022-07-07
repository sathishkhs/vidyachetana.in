<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_Templates_Model extends CI_Model {

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

    public function view($lang_id = 1) {
        $this->db->order_by('a.last_modified_date DESC');
        $this->db->where('a.lang_id', $lang_id);
        $this->db->select('a.*,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as a'); 
        $this->db->join('admin_users as u', 'a.modified_by = u.user_id' , 'left');
        $this->db->join('admin_users as au', 'a.created_by = au.user_id' , 'left');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function fetch_data($limit, $offset, $lang_id = 1) {
		$this->db->order_by('last_modified_date	 DESC');   
        $this->db->order_by('a.last_modified_date DESC');
        $this->db->where('a.lang_id', $lang_id);
        $this->db->select('a.*,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as a'); 
        $this->db->join('admin_users as u', 'a.modified_by = u.user_id' , 'left');
        $this->db->join('admin_users as au', 'a.created_by = au.user_id' , 'left');
		$this->db->limit($offset,$limit);
        $query = $this->db->get();
       //echo $this->db->last_query(); exit;
        return $query->result();
    }
	
	public function rows_count() {
        $this->db->select('COUNT(template_id) as counter');
        $query = $this->db->get($this->table);
		$count = $query->result();
		return $count[0]->counter;
    }
	
	public function view_variables($template_id, $lang_id=1) {
         $this->db->where('a.lang_id',$lang_id);
        $this->db->where('a.template_id',$template_id);
        $this->db->select('a.template_id,ev.variable_id,ev.variable_text,ev.variable_name');
        $this->db->from($this->table. ' as a');
         $this->db->join('email_template_variables as ev', 'a.template_id = ev.template_id', 'left');
        $query = $this->db->get();
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

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }
	
	public function copy_multiple($template_ids, $lang_id_from, $copy_lang_id_to) {
        $template_ids = implode(",", $template_ids);
        $userid = $this->session->userdata('user_id');
        $this->db->query("REPLACE INTO `email_templates`( `template_id`, `lang_id`, `template_title`, `template_content`,`from`,`cc`,`bcc`, `status_ind`, `created_date`, `created_by`, `modified_by`)
                          SELECT `template_id`, $copy_lang_id_to as `lang_id`, `template_title`, `template_content`,`from`,`cc`,`bcc`, `status_ind`, `created_date`, `created_by`, `modified_by` FROM `email_templates` WHERE `lang_id` = $lang_id_from");
      
        $this->reset_pk();
        return true;
    }
    public function get_pagination($table){
        $this->db->select('*');
        $q = $this->db->get($table);
        return $q;

    }
}