<?php 

Class Sevas_Model extends CI_Model {

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

    public function view_pages() {
        $this->db->order_by('page_id DESC');
        $this->db->select('p.*,pt.type_name,u.username as last_modified_user,au.username as created_user');
        $this->db->from('pages' . ' as p ');
        $this->db->join('page_types as pt', 'pt.type_id = p.type_id', 'left');        
        $this->db->join('admin_users as u', 'p.last_modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'p.created_by = au.user_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function page_type() {
        //$this->db->where('type_status','1');
        $this->db->order_by('type_name');
        $query = $this->db->select('*')->from('page_types')->get();
        return $query->result();
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


