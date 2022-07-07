<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menuitems extends MY_Controller {

    private $partners_photos_upload_config;
    public $class_name;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        /* these are the default modules to load in all controller */
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_menuitems_model');
        $this->load->model('admin_users_accesses_model');
        /* these are the default modules to load in all controller */
        $this->load->model('menuitems_model');
        $this->load->model('menus_model');
        $user_id = $this->session->userdata('user_id');
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id) || !$this->admin_users_accesses_model->is_allowed($user_id, 1) || $this->session->userdata('role_id') != 1) {
            redirect('logout');
        } else {
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
        $permissions = $this->admin_users_accesses_model->get_permisions($user_id, 37);
        $this->permission = array($permissions->add_permission, $permissions->edit_permission, $permissions->delete_permission);

    }

    public function index() {
        $msg = array();
        $data['view'] = $this->class_name . '/list';
        $data['query'] = $this->menuitems_model->view();
        $data['title'] = 'Admin Page Menu - ' . SITE_TITLE;
        $data['page_heading'] = 'Menuitems List';
        $data['breadcrumb'] = "Menuitems List";
        $data['scripts'] = array('assets/javascripts/' . $this->class_name . '.js', 'assets/javascripts/dashboard.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        if ($this->permission[0] > 0) {
            $msg = array();
            $data['view'] = $this->class_name . '/form';
            $data['title'] = 'Add New Menu - ' . SITE_TITLE;
            $data['breadcrumb'] = "<a href=$this->class_name>Menuitems List</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add New Menu";
            $data['menu'] = $this->menus_model->view();
            $data['page_heading'] = 'Add New Menu';
            $data['scripts'] = array('assets/javascripts/' . $this->class_name . '.js', 'assets/javascripts/dashboard.js');
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function edit($menuitem_id) {
        if ($this->permission[1] > 0) {
            if (!empty($menuitem_id)) {
                $this->menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
                $data['query'] = $this->menuitems_model->get_row();
                $data['menu'] = $this->menus_model->view();
                $data['roles'] = $this->admin_roles_model->view_roles();
                $data['view'] = $this->class_name . '/form';
                $data['title'] = 'Edit Menu - ' . SITE_TITLE;
                $data['breadcrumb'] = "<a href=$this->class_name>Menu List</a> &nbsp;&nbsp; > &nbsp;&nbsp; Edit Menu";
                $data['page_heading'] = 'Edit Menu';
                $data['scripts'] = array('assets/javascripts/' . $this->class_name . '.js', 'assets/javascripts/dashboard.js');
                $this->load->view('templates/dashboard', $data);
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function save() {

        if (!empty($_POST) && ($this->permission[0] > 0 || $this->permission[1] > 0)) {
            $menuitem_id = $this->input->post('menuitem_id');
            $this->menuitems_model->data = $this->input->post();
            $this->menuitems_model->data = $this->input->post();
            if ($this->menuitems_model->data['parent_menuitem_id'] == '') {
                unset($this->menuitems_model->data['parent_menuitem_id']);
            }
            if (!empty($menuitem_id)) {
                $this->menuitems_model->data['last_modified_date'] = date('Y-m-d');
                $this->menuitems_model->data['modified_by'] = $this->session->userdata('user_id');
                $this->menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
                if ($this->menuitems_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
                }
            } else {
                unset($this->menuitems_model->data['menuitem_id']);
                $this->menuitems_model->data['created_date'] = date('Y-m-d');
                $this->menuitems_model->data['created_by'] = $this->session->userdata('user_id');
                if ($this->menuitems_model->insert()) {
                    $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
                }
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }

    public function delete($menuitem_id) {
        if (!empty($menuitem_id) && $this->permission[2] > 0) {
            $this->menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
            if ($this->menuitems_model->delete()) {
                $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Deleted Successfully');
            } else {
                $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }
}