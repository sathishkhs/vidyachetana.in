<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_model extends CI_Model
{

    private $table;
    public $primary_key;
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset()
    {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk()
    {
        $this->primary_key = array();
    }

    private function reset_data()
    {
        $this->data = array();
    }

    public function view($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->get();
        return $query->result();
    }
    public function settings($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->order_by('display_order','asc')
            ->get();
        return $query->result();
    }

    public function get_row($table)
    {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function get_rowdata($table)
    {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->result();
        $this->reset_pk();
        return $row;
    }

    public function insert($table)
    {
        $this->db->insert($table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update($table)
    {
        $this->db->update($table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function delete($table)
    {
        $this->db->where($this->primary_key);
        $this->db->delete($table);
        $this->reset_pk();
        return true;
    }

    public function get_pagination($table)
    {
        $this->db->select('*');
        $q = $this->db->get($table);
        return $q;
    }

    public function update_image($banner_id)
    {

        $this->db->where('banner_id', $banner_id);
        $this->db->set('banner_background_img_path', null);
        $this->db->update('banners', $this->data, $this->primary_key);
        $this->reset();
        return true;
    }
    public function update_photo_image($page_id)
    {

        $this->db->where('page_id', $page_id);
        $this->db->set('photo_path', null);
        $this->db->update('pages', $this->data, $this->primary_key);
        $this->reset();
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
    public function page_type()
    {
        //$this->db->where('type_status','1');
        $this->db->order_by('type_name');
        $query = $this->db->select('*')->from('page_types')->get();
        return $query->result();
    }
    public function is_exist($table)
    {
        $this->db->where($this->primary_key);
        $this->db->select('COUNT(*) as counter');
        $query = $this->db->get($table);
        $row = $query->row();
        return $row->counter;
    }
    
    public function widgets_view()
    {
        $this->db->where('w.page_wise_widgets', '0');
        $this->db->order_by('w.display_order ASC');
        $this->db->select('w.*,t.template_name,a.area_name,p.type_name');
        $this->db->from('widgets' . ' as w');
        $this->db->join('templates as t', 'w.template_id = t.template_id ', 'left');
        $this->db->join('widget_areas as a', 'w.area_id = a.area_id', 'left');
        $this->db->join('page_types as p', 'w.widget_type = p.type_id', 'left');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    public function view_menu($table)
    {
        $this->db->order_by('i.display_order ASC, i.last_modified_date DESC');
        //$this->db->where('i.status_ind', 1);
        $this->db->select('i.*,m.menu_name');
        $this->db->from($table . ' as i');
        $this->db->join('menus as m', 'i.menu_id = m.menu_id', 'left');
        $this->db->order_by('m.menu_name,i.display_order,i.menuitem_text');
        $query = $this->db->get();
        return $query;
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
