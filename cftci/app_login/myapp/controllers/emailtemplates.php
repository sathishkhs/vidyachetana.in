<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class EmailTemplates extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('email_templates_model');
        $this->load->model('admin_users_accesses_model');

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

    public function index() {
       
        $data['view'] = 'email_templates/list';
        $data['title'] = 'Administrator Dashboard ';
        $data['breadcrumb'] = 'Email Templates List';
        $data['page_heading'] = 'Email Templates List';
		$data['scripts'] = array('assets/javascripts/emailtemplates.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        $data['view'] = 'email_templates/form';
        $data['title'] = 'Administrator Dashboard ';
        $data['page_heading'] = 'Add Email Templates';
        $data['breadcrumb'] = 'Add Email Templates';
        $data['scripts'] = array('javascripts/emailtemplate.js','js/ckeditor/ckeditor.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function edit($template_id) {
        $this->email_templates_model->primary_key = array('template_id' => $template_id, 'lang_id' => $this->session->userdata('lang_id'));
        $data['query'] = $this->email_templates_model->get_row();
		
        $data['view'] = 'email_templates/form';
        $data['title'] = 'Administrator Dashboard ';
        $data['page_heading'] = 'Edit Email Templates';
        $data['breadcrumb'] = 'Edit Email Templates';
        $data['scripts'] = array('javascripts/emailtemplate.js','js/ckeditor/ckeditor.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save() {
        $msg = array();
        $this->form_validation->set_rules('template_title', 'Template Title', 'required');
        $this->form_validation->set_rules('template_content', 'Template Content', 'required');
        $template_id = $this->input->post('template_id');
        $new_template_id = $this->email_templates_model->get_max_value('template_id') + 1;
        $this->email_templates_model->data = $this->input->post();
        //mutlti-language is starting..
        //$languages = $this->input->post('languages');
        //unset($this->email_templates_model->data['languages']);

        if ($this->form_validation->run() == true) {

          //  foreach ($languages as $lang_id) {
                if (empty($template_id)) { // ADD case
                    $this->email_templates_model->data['template_id'] = $new_template_id;
                    $this->email_templates_model->data['lang_id'] = 1;
                    $this->email_templates_model->data['created_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['created_by'] = $this->session->userdata('user_id');
                    $this->email_templates_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['modified_by'] = $this->session->userdata('user_id');

                    if ($this->email_templates_model->insert()) {
                        $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record updated successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
                    }
                } else { // EDIT case
                    $this->email_templates_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['modified_by'] = $this->session->userdata('user_id');

                    $this->email_templates_model->primary_key = array('template_id' => $this->input->post('template_id'));
                    if ($this->email_templates_model->is_exist()) {
                        unset($this->email_templates_model->data['template_id']);
                        unset($this->email_templates_model->data['lang_id']);
                        if ($this->email_templates_model->update()) {
                            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record updated successfully.');
                        } else {
                            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
                        }
                    } else {
                        $this->email_templates_model->data['template_id'] = $this->input->post('template_id');
                        $this->email_templates_model->data['lang_id'] = $lang_id;
                        $this->email_templates_model->data['created_date'] = date("Y-m-d H:i:s");
                        $this->email_templates_model->data['created_by'] = $this->session->userdata('user_id');
                        $this->email_templates_model->insert();
                    }
                }
           //}
            $this->session->set_flashdata('msg', $msg);
            redirect('email-templates');
        } else {
            $template_id = $this->input->post('template_id');
            if (!empty($template_id)) {
                $this->email_templates_model->primary_key = array('template_id' => $this->input->post('template_id'), 'lang_id' => $this->session->userdata('lang_id'));
                $data['query'] = $this->email_templates_model->get_row();
            }
            $data['query'] = (object) $this->input->post();
            $data['view'] = 'email_templates/form';
            $data['title'] = 'Administrator Dashboard';
            $data['page_heading'] = 'Add/Edit Email Templates';
            $data['breadcrumb'] = 'Email Templates List';
            $data['scripts'] = array('javascripts/emailtemplates.js');
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function delete($template_id) {
        $msg = array();
        $this->email_templates_model->primary_key = array('template_id' => $template_id, 'lang_id' => $this->session->userdata('lang_id'));
        if ($this->email_templates_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record deleted successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('email-templates');
    }
	
	public function copy_multiple() {
        $template_ids = $this->input->post('template_ids');
        $copy_lang_id_to = $this->input->post('copy_lang_id_to');
        $msg = array();
        if ($this->email_templates_model->copy_multiple($template_ids, $this->session->userdata('lang_id'), $copy_lang_id_to)) {
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Record copied successfully');
        } else {
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to copied.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('email-templates');
    }

    public function email_templates_list(){

		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$emailtemplates = $this->email_templates_model->get_pagination('email_templates');

		$data = array();

		foreach ($emailtemplates->result() as $row) {

			$modified_by = ($row->modified_by == 0) ? $row->created_by : $row->modified_by;
			$this->admin_users_model->primary_key = array('user_id'=>$modified_by);
			$modified_by = $this->admin_users_model->get_row()->username;
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$date =  ($row->last_modified_date == "") ?  $row->created_date : $row->last_modified_date;
			$data[] = array(
				$row->template_title,
				$date,
				$modified_by,
				$status,
			
				'
			<td><div class="action-buttons">
			<a class="" title="Edit" href="emailtemplates/edit/' . $row->page_id . '">
			<button class="btn btn-primary btn-small "><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="emailtemplates/delete/' . $row->page_id . '"> 
			<button class="btn btn-danger btn-small "><i class="fa fa-trash"></i></button></a>&nbsp;
			</div></td>
			');
			}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $emailtemplates->num_rows(),
			"recordsFiltered" => $emailtemplates->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	
	}
	
	public function pagination($path, $count, $per_page, $fetch_query){
		//pagination
		$this->load->library('pagination');

		$config['base_url'] = base_url().$path;
		$config['total_rows'] = $count;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
		
		$config['full_tag_open'] = "<div class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] = "</div>";
		
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
		
		$this->pagination->initialize($config);
		//echo $this->pagination->create_links(); 
		//$this->admin_users_model->fetch_data( ($page-1) * $config["per_page"], $config["per_page"])
		$data = $fetch_query;	
		
		return $data;
	}
}