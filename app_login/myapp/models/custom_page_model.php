<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Custom_Page_Model extends CI_Model {

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
    public function insert($table){
     $q = $this->db->insert($table,$this->data);
     $this->reset_data();
     return $q;   
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

    public function get_row($table,$preview = "") {
        if ($preview != "yes") {
            $this->db->where('status_ind', '1');
        }
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        //echo $this->db->last_query(); exit;
        return $row;
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
    public function getdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->result();
    }
    public function view_rowdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->row();
    }
    public function view_data($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $q = $this->db->get($table);
        return $q->result();
    }
    
    public function view(){
        $this->db->where('status_ind',1);
        $this->db->select('*');
        $q = $this->db->get($this->table);
        return $q->result();
    }
   public function get_sevas($seva_category_id){
      
       $this->db->select('*');
       $this->db->where_in('seva_category_id',explode(',',$seva_category_id));
       $seva_categories = $this->db->get('seva_category')->result();

       foreach($seva_categories as $key => $seva_category){
           $this->db->where('seva_category_id',$seva_category->seva_category_id);
           $sevas = $this->db->get('sevas')->result();
            $category[$key] = $seva_category;
            foreach($sevas as $iter => $seva){
               
                $category[$key]->seva[$iter] = $seva;
            }
        }
     return $category;
   }

   public function get_gallery_data($table){
        $this->db->select('g.*, p.page_slug');
        $this->db->where('g.status_ind',1);
        $this->db->where('p.status_ind',1);
        $this->db->from($table.' as g');
        $this->db->join('pages as p', 'g.gallery_id = p.gallery_id','left');
        $q = $this->db->get();
        return $q->result();
   }
}
