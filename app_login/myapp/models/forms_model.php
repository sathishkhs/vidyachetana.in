<?php 

Class Forms_Model extends CI_Model {

    public $primary_key;
    public $table; 
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->class_name = strtolower( substr(get_class(),0,-6));
        $this->table = $this->class_name;
    }

    public function view(){
        return $this->db->select('*')->from($this->table)->get()->result();
    }
    public function view_data($table_name){
        $this->db->select('*');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $this->db->from($table_name);
        $q = $this->db->get();
        return $q->result();
    }
    public function get_row($table_name){
        $this->db->select('*');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $this->db->from($table_name);
        $q = $this->db->get();
        return $q->row();
    }

    public function pagination($table_name){
      return  $this->db->select('*')->get($table_name);
    }

    public function update($table_name){
        $this->db->where($this->primary_key);
       return $this->db->update($table_name,$this->data);
    }

    public function insert($table_name){
      
        return $this->db->insert($table_name,$this->data);
    }
    public function delete($table_name){
        $this->db->where($this->primary_key);
        return $this->db->delete($table_name);
    }

}


