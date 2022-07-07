<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminroles extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_menuitems_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_roles_accesses_model');
        $this->load->model('admin_users_accesses_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id) || $this->session->userdata('role_id') != 1) {
            redirect('');
        } else {
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
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

    public function access($role_id = 1) {
        $accesses = array();
         $acc_query = $this->admin_menuitems_model->view();
          $data['admin_roles'] = $this->admin_roles_model->view();
        $acc_data = array();
        foreach ($acc_query as $acc) {
            if(!empty($acc->parent_menuitem_id)){
                $acc_data[$acc->parent_menuitem_id]['child'][] = $acc;
            } else {
                $acc_data[$acc->menuitem_id]['parent'] = $acc;
            }
        }
        $data['query'] = $acc_data;
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Admin Roles';
        $data['breadcrumb'] = 'Admin Roles';
        $data['scripts'] = array('assets/javascripts/adminusers.js');
        $this->load->view('templates/dashboard', $data);
    }
   /* public function access($role_id = 1) {
        $accesses = array();
         $acc_query=$data['query'] = $this->admin_menuitems_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Admin Roles';
        $data['scripts'] = array('assets/javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }*/
public function access2($role_id = 1) {
        $accesses = array();
        $data['query'] = $this->admin_menuitems_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard - MIS';
        $data['page_heading'] = 'Admin Roles';
        $data['breadcrumb'] = 'Admin Roles';
        $data['scripts'] = array('assets/javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function access1($user_id) {
        $accesses = array();
        $acc_query = $this->admin_menuitems_model->view();
        $acc_data = array();
        foreach ($acc_query as $acc) {

            if(!empty($acc->parent_menuitem_id)){
                $acc_data[$acc->parent_menuitem_id]['child'][] = $acc;
            } else {
                $acc_data[$acc->menuitem_id]['parent'] = $acc;
            }
        }
        $data['query'] = $acc_data;
        $roles_accesses = $this->admin_users_accesses_model->view($user_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }

        $data['user_id'] = $user_id;
        $data['admin_users_accesses'] = $accesses;
        $data['view'] = 'admin_users/accessform';
        $data['title'] = 'Administrator Dashboard - MIS';
        $data['page_heading'] = 'Users Roles';
        $data['breadcrumb'] = 'Users Roles';
        $data['scripts'] = array('assets/javascripts/adminusers.js');
        $this->load->view('templates/dashboard', $data);
    }


    public function index() {
        $data['query'] = $this->admin_roles_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $data['view'] = 'admin_roles/list';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Admin Roles List';
        $data['breadcrumb'] = 'Admin Roles List';
		$data['scripts'] = array('assets/javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        $data['view'] = 'admin_roles/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Add Admin Roles';
        $data['breadcrumb'] = 'Add Admin Roles';
        $data['scripts'] = array('assets/javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function edit($role_id) {
        $this->admin_roles_model->primary_key = array('role_id' => $role_id);
        $data['query'] = $this->admin_roles_model->get_row();
        $data['view'] = 'admin_roles/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Edit Admin Roles';
        $data['breadcrumb'] = 'Edit Admin Roles';
        $data['scripts'] = array('assets/javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save() {
        $msg = array();
        $this->form_validation->set_rules('role_name', 'Admin Role Name', 'required');
        $role_id = $this->input->post('role_id');
        $qq=$this->input->post('admin_disp');
        $new_role_id = $this->admin_roles_model->get_max_value('role_id') + 1;
        $this->admin_roles_model->data = $this->input->post();

        if ($this->form_validation->run() == true) {
            if (empty($role_id)) { // ADD case
                $this->admin_roles_model->data['role_id'] = $new_role_id;
                $this->admin_roles_model->data['created_date'] = date("Y-m-d H:i:s");
                $this->admin_roles_model->data['created_by'] = $this->session->userdata('user_id');
                $this->admin_roles_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->admin_roles_model->data['modified_by'] = $this->session->userdata('user_id');
                // $this->admin_roles_model->data['admin_disp'] = $qq;

                if ($this->admin_roles_model->insert()) {

                    $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record added successfully.');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
                }
            } else { // EDIT case
                $this->admin_roles_model->primary_key = array('role_id' => $this->input->post('role_id'));
                $this->honor_rolls_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->honor_rolls_model->data['modified_by'] = $this->session->userdata('user_id');
                // $this->admin_roles_model->data['admin_disp'] = $qq;
                if ($this->admin_roles_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record updated successfully.');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('adminroles');
        } else {
            $role_id = $this->input->post('role_id');
            if (!empty($role_id)) {
                $this->admin_roles_model->primary_key = array('role_id' => $this->input->post('role_id'));
                $data['query'] = $this->admin_roles_model->get_row();
            }
            $data['query'] = (object) $this->input->post();
            $data['view'] = 'admin_roles/form';
            $data['title'] = 'Administrator Dashboard';
            $data['page_heading'] = 'Add/Edit Admin Roles';
            $data['breadcrumb'] = 'Add/Edit Admin Roles';
            $data['scripts'] = array('assets/javascripts/adminroles.js');
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function delete($role_id) {
        $msg = array();
        $this->admin_roles_model->primary_key = array('role_id' => $role_id);
        if ($this->admin_roles_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record deleted successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('adminroles');
    }

    public function update() {
        $status = true;
        $role_id = $this->input->post('role_id');
        $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
        if ($this->admin_roles_accesses_model->delete()) {
            foreach ($this->input->post('menuitem_id') as $menuitem_id) {
                $this->admin_roles_accesses_model->data = array('menuitem_id' => $menuitem_id, 'role_id' => $role_id);
                if ($this->admin_roles_accesses_model->insert()) {
                    $status = TRUE;
                }
            }
        }

        if ($status) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Save Changes Updated Successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('adminroles');
    }

    public function admin_roles_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$admin_roles = $this->admin_users_model->get_pagination('admin_roles');
		$data = array();
		foreach($admin_roles->result() as $row) {
			// $this->admin_roles_model->primary_key = array('role_id'=>$row->role_id);
			// $role = $this->admin_roles_model->get_row()->role_name;
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$modified_by = ($row->modified_by == 0) ? $row->created_by : $row->modified_by ;
			$this->admin_users_model->primary_key = array('user_id'=>$modified_by);
			$modified_by = $this->admin_users_model->get_row()->username;
			$data[] = array(
				$row->role_name,
				$row->modified_date,
				$modified_by,
				$status,
				'
					<td><div class="action-buttons">

					<a class="" title="Edit" href="adminroles/edit/'.$row->role_id.'">

				<button class="btn btn-primary btn-small"><i class="fa fa-edit"></i></button></a>&nbsp;

			<a class="red" title="Delete" href="adminroles/delete/' . $row->role_id.'">

				<button class="btn btn-danger btn-small"><i class="fa fa-trash"></i></button></a>&nbsp;

			<a class="" title="Access" href="adminroles/access/' . $row->role_id.'">

				<button class="btn btn-warning btn-small"><i class="fa fa-eye"></i></button></a>&nbsp;

					</div></td>
				'

			);


		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" =>$admin_roles->num_rows(),
			"recordsFiltered" =>$admin_roles->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
	   exit();

}

}