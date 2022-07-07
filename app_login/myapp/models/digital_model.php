<?php 

Class Digital_Model extends CI_Model {

    public $primary_key;
    public $table; 
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->class_name = strtolower( substr(get_class(),0,-6));
        $this->table = $this->class_name;
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
        $this->reset_pk();
        return $q->result();
    }
    public function get_row($table_name){
        $this->db->select('*');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $this->db->from($table_name);
        $q = $this->db->get();
        $this->reset_pk();
        return $q->row();
    }

    public function pagination($table_name){
      return  $this->db->select('*')->get($table_name);
    }

    public function update($table_name){
        $this->db->where($this->primary_key);
       $q = $this->db->update($table_name,$this->data);
       $this->reset_pk();
       return true;
    }

    public function insert($table_name){
         $this->db->insert($table_name,$this->data);
         $this->reset_data();
         return true;
        
    }
    public function delete($table_name){
        $this->db->where($this->primary_key);
        $this->db->delete($table_name);
        $this->reset_pk();
        return true;
    }


    public function min_donation($table_name){
        $this->db->select('MIN(amount) as min_donation, MAX(amount) as max_donation, AVG(amount) as avg_donation');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $this->db->from($table_name);
        $q = $this->db->get();
        $this->reset_pk();
        return $q->row();
    }

    public function frequent_donation($table_name){
        // $this->db->select('MIN(amount) as min_donation, MAX(amount) as max_donation, AVG(amount) as avg_donation');
        // if(!empty($this->primary_key)){
        //     $this->db->where($this->primary_key);
        // }
        // $this->db->from($table_name);
        // $q = $this->db->get();
        // $this->reset_pk();
        // return $q->row();

        $this->db->select('amount, COUNT(*) as frequency');
        if(!empty($this->primary_key)){
            $this->db->where($this->primary_key);
        }
        $this->db->group_by('amount');
        $this->db->order_by('COUNT(*)', 'DESC');
        $this->db->limit('1');
        $q = $this->db->get($table_name);
        $this->reset_pk();
        return $q->row();
        // $sql = 'SELECT amount, COUNT(*) AS frequency FROM `payments` GROUP BY amount ORDER BY COUNT(*) DESC LIMIT 1;';
        // $q = $this->db->query($sql)->row();
        // print_r($q);

    }
}