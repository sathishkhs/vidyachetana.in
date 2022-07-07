<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminusers extends MY_Controller
{
   public function __construct()
    {

        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('admin_roles_accesses_model');
        $this->load->model('admin_menuitems_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        } else {
            $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            if(isset($_SESSION['sidebar_menuitems']) && !empty($_SESSION['sidebar_menuitems'])){

            } else {
                //$side_menu_users = $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $side_menu_roles['sidebar_menuitems'] = $this->admin_roles_accesses_model->get_role_access($this->session->userdata('role_id'));
                $this->session->set_userdata($side_menu_roles);

                $_SESSION['sidebar_menuitems'] = $this->session->userdata('sidebar_menuitems');
            }
        }
    }

    public function index()
    {

        if ($this->session->userdata('role_id') == 1 ) {
            $data['view'] = 'admin_users/list';
            $data['title'] = 'Administrator Dashboard ';
            $data['breadcrumb'] = 'Admin Users List';
            $data['page_heading'] = 'Admin Users List';
            $data['scripts'] = array('assets/javascripts/adminusers.js');
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'You are not Admin. So you dont have access for users section.');
            $this->session->set_flashdata('msg', $msg);
            redirect('');
        }
    }

    public function add()
    {

        if ($this->session->userdata('role_id') == 1 ) {
            $data['query'] = $this->admin_users_model->view();
            $data['usersrole'] = $this->admin_roles_model->view();
            $data['view'] = 'admin_users/form';
            $data['title'] = 'Administrator Dashboard ';
            $data['breadcrumb'] = 'Add User';
            $data['page_heading'] = 'Add Admin Users';
            $data['scripts'] = array('assets/javascripts/adminusers.js');
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'You are not Admin. So you dont have access for users section.');
            $this->session->set_flashdata('msg', $msg);
            redirect('');
        }
    }



    public function edit($user_id)
    {

        if ($this->session->userdata('role_id') == 1 ) {
            $this->admin_users_model->primary_key = array('user_id' => $user_id);
            $data['query'] = $this->admin_users_model->get_row();
            $data['usersrole'] = $this->admin_roles_model->view();
            $data['view'] = 'admin_users/form';
            $data['title'] = 'Administrator Dashboard ';
            $data['breadcrumb'] = 'Edit User';
            $data['page_heading'] = 'Edit User';
            $data['scripts'] = array('assets/javascripts/adminusers.js');
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'You are not Admin. So you dont have access for users section.');
            $this->session->set_flashdata('msg', $msg);
            redirect('');
        }
    }

    public function save()
    {

        $user_id = $this->session->userdata('user_id');
        if ($this->session->userdata('role_id') == 1 ) {
            $msg = array();
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|callback_check_duplicate_username');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
            $role_id = $this->input->post('role_id');
            $user_id = $this->input->post('user_id');
            $new_user_id = $this->admin_users_model->get_max_value('user_id') + 1;

            if (!empty($user_id)) {
                $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[40]|matches[confirm_password]');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', '');
            } else {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[40]|matches[confirm_password]');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
            }

            if ($this->form_validation->run() == true) {
                $this->admin_users_model->data = $this->input->post();
                unset($this->admin_users_model->data['confirm_password']);

                if (empty($user_id)) { // ADD case
                    $this->admin_users_model->data['password'] = md5($this->input->post('password'));
                    $this->admin_users_model->data['user_id'] = $new_user_id;
                    $this->admin_users_model->data['created_date'] = date("Y-m-d H:i:s");
                    $this->admin_users_model->data['created_by'] = $this->session->userdata('user_id');
                    $this->admin_users_model->data['modified_date'] = date("Y-m-d H:i:s");
                    $this->admin_users_model->data['modified_by'] = $this->session->userdata('user_id');

                    if ($this->admin_users_model->insert()) {
                        if($this->input->post('status_ind') == 1){
                            $this->db->query("INSERT INTO `admin_users_accesses` SELECT $new_user_id as user_id,menuitem_id FROM `admin_roles_accesses` WHERE role_id=$role_id");
                            }
                        $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'User Successfully Sreated.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
                    }
                } else { // EDIT case
                    if(!empty($_POST['password'] ) && isset($_POST['password'])){
                        $this->admin_users_model->data['password'] = md5($this->input->post('password'));
                    }else{
                        unset($this->admin_users_model->data['password']);
                    }
                    $this->admin_users_model->data['modified_date'] = date("Y-m-d H:i:s");
                    $this->admin_users_model->data['modified_by'] = $this->session->userdata('user_id');
                    $this->admin_users_model->primary_key = array('user_id' => $this->input->post('user_id'));
                    if ($this->admin_users_model->update()) {
                        $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'User updated successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
                    }
                }

                $this->session->set_flashdata('msg', $msg);
                redirect('adminusers');
            } else {
                $data['msg'] = $msg;
                $user_id = $this->input->post('user_id');
                if (!empty($user_id)) {
                    $this->admin_users_model->primary_key = array('user_id' => $this->input->post('user_id'));
                    $data['query'] = $this->admin_users_model->get_row();
                }
                $data['query'] = (object) $this->input->post();
                $data['view'] = 'admin_users/form';
                $data['title'] = 'Administrator Dashboard';
                $data['page_heading'] = 'Add/Edit User';
                $data['breadcrumb'] = 'Add/Edit User';
                $data['usersrole'] = $this->admin_roles_model->view();
                $data['scripts'] = array('assets/javascripts/adminusers.js');
                $this->load->view('templates/dashboard', $data);
            }
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'You are not Admin. So you dont have access for users section.');
            $this->session->set_flashdata('msg', $msg);
            redirect('');
        }
    }



    public function check_duplicate_email()
    {
        $email = $this->input->post('email');
        $user_id = $this->input->post('user_id');
        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;
        if ($this->admin_users_model->check_duplicate('email', $email, $user_id)) {
            $this->form_validation->set_message('check_duplicate_email', 'Sorry! Email aready exist.');
            return false;
        }
        return true;
    }



    public function check_duplicate_username()
    {
        $username = $this->input->post('username');
        $user_id = $this->input->post('user_id');
        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;
        if ($this->admin_users_model->check_duplicate('username', $username, $user_id)) {
            $this->form_validation->set_message('check_duplicate_username', 'Sorry! Username aready exist.');
            return false;
        }
        return true;
    }



    public function delete($user_id)
    {

        $msg = array();
        $this->admin_users_accesses_model->primary_key = array('user_id' => $user_id);
        $this->admin_users_accesses_model->delete();
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        if ($this->admin_users_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'User deleted successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('adminusers');
    }



    public function access($user_id)
    {
        $accesses = array();
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $role_id = $this->admin_users_model->get_rowdata('admin_users')->role_id;
        // $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        $data['query'] = $this->admin_menuitems_model->view_access_menuitems($role_id);
        $roles_accesses = $this->admin_users_accesses_model->view($user_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['user_id'] = $user_id;
        $data['admin_users_accesses'] = $accesses;
        $data['view'] = 'admin_users/accessform';
        $data['title'] = 'Administrator Dashboard ';
        $data['breadcrumb'] = 'User Access';
        $data['page_heading'] = 'Users Roles';
        $data['scripts'] = array('assets/javascripts/adminusers.js');

        $this->load->view('templates/dashboard', $data);
    }



    public function saveaccess()
    {
        $status = true;
        $user_id = $this->input->post('user_id');
        $this->admin_users_accesses_model->primary_key = array('user_id' => $user_id);
        if ($this->admin_users_accesses_model->delete()) {
            foreach ($this->input->post('menuitem_id') as $menuitem_id) {
                $this->admin_users_accesses_model->data = array('menuitem_id' => $menuitem_id, 'user_id' => $user_id);
                if ($this->admin_users_accesses_model->insert()) {
                    $status = true;
                }
            }
        }



        if ($status) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Save Changes Updated Successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('adminusers');
    }

    public function admin_users_list()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        // $this->admin_users_model->primary_key = array('role_id' => 1);
        $admin_users = $this->admin_users_model->get_pagination('admin_users');
        $data = array();
        foreach ($admin_users->result() as $row) {
            $this->admin_roles_model->primary_key = array('role_id' => $row->role_id);
            $role = $this->admin_roles_model->get_row()->role_name;
            $status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";

            $data[] = array(
                $row->first_name . ' ' . $row->last_name,
                $row->email,
                $role,
                $row->username,
                $row->modified_date,

                $status,
                '
					<td><div class="action-buttons">
					<a class="" title="Edit" href="adminusers/edit/' . $row->user_id . '">
				<button class="btn btn-primary btn-small"><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="adminusers/delete/' . $row->user_id . '">
				<button class="btn btn-danger btn-small"><i class="fa fa-trash"></i></button></a>&nbsp;
			<a class="" title="Access" href="adminusers/access/' . $row->user_id . '">
				<button class="btn btn-warning btn-small"><i class="fa fa-eye"></i></button></a>&nbsp;
					</div></td>
				'

            );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $admin_users->num_rows(),
            "recordsFiltered" => $admin_users->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }


}
