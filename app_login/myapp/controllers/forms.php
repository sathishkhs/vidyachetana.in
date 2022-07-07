<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forms extends MY_Controller {

    public function __construct() {
        parent::__construct();
		
		$this->load->model('forms_model');
		$user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }
	}
		
    public function index(){
        $data['query'] = $this->forms_model->view_data('forms');	
		$data['view'] = 'forms/list';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Form List';
        $data['breadcrumb'] = 'Form List';
        $data['scripts'] = array('assets/javascripts/forms.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function form_add(){
		$data['view'] = 'forms/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Add Form';
        $data['breadcrumb'] = 'Add Form';
        $data['scripts'] = array('assets/javascripts/forms.js');
        $this->load->view('templates/dashboard', $data);
	}
	
	public function form_edit($form_id){
		$this->forms_model->primary_key = array('form_id' => $form_id);
		$data['query'] = $this->forms_model->get_row('forms');		
		$data['view'] = 'forms/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Edit Form';
        $data['breadcrumb'] = 'Edit Form';
        $data['scripts'] = array('assets/javascripts/forms.js');
        $this->load->view('templates/dashboard', $data);
	}

	public function form_delete($form_id){
		$this->forms_model->primary_key = array('form_id' => $form_id);
		if($this->forms_model->delete('forms')){
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		}else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg',$msg);
		redirect('forms');
	}

    public function form_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $forms = $this->forms_model->pagination('forms');
        $data = array();

		foreach ($forms->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->form_title,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="forms/form_edit/' . $row->form_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="forms/form_delete/' . $row->form_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $forms->num_rows(),
			"recordsFiltered" => $forms->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }
    public function forms_save(){
        $form_id =  $this->input->post('form_id');
        $this->forms_model->data['form_title'] = $this->input->post('form_title');
        $this->forms_model->data['form_data']  = $this->input->post('form_data');
        $this->forms_model->data['status_ind']  = $this->input->post('status_ind');
        
        if(!empty($form_id)){ //Edit Case
            $this->forms_model->data['modified_date'] = $modified_date = date('Y-m-d');
            $this->forms_model->data['modified_by'] = $this->session->userdata('user_id');
            $this->forms_model->primary_key = ['form_id'=>$form_id];
            if($this->forms_model->update('forms')){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
            }

        }else{ //Add Case

            $this->forms_model->data['created_date']  = date('Y-m-d');
            $this->forms_model->data['created_by']  = $this->session->userdata('user_id');
            $this->forms_model->data['modified_date']  = date('Y-m-d');
            $this->forms_model->data['modified_by']  = $this->session->userdata('user_id');
           
            if($this->forms_model->insert('forms')){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
       }
       $this->session->set_flashdata('msg', $msg);
       redirect('forms');
    }
}