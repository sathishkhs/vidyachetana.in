<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sevas extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sevas_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['query'] = $this->sevas_model->view_data('sevas');
		$data['view'] = 'sevas/sevas_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Sevas List';
		$data['breadcrumb'] = 'Sevas List';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function sevas_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $sevas = $this->sevas_model-> pagination('sevas');
        $data = array();

		foreach ($sevas->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->seva_name,
                $row->seva_amount,
                $row->seva_category_id,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="sevas/sevas_edit/' . $row->sevas_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="sevas/sevas_delete/' . $row->sevas_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $sevas->num_rows(),
			"recordsFiltered" => $sevas->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }

	public function sevas_add(){
		$data['seva_categories'] = $this->sevas_model->view_data('seva_category');
		$data['view'] = 'sevas/sevas_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Sevas Form';
		$data['breadcrumb'] = 'Sevas Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function sevas_edit($sevas_id){
		$data['seva_categories'] = $this->sevas_model->view_data('seva_category');
        $this->sevas_model->primary_key = array('sevas_id'=>$sevas_id);
        $data['query'] = $this->sevas_model->get_row('sevas');
		$data['view'] = 'sevas/sevas_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Sevas Form';
		$data['breadcrumb'] = 'Sevas Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }

	public function sevas_save()
	 {
		 $sevas_id = $this->input->post('sevas_id');
		 $this->sevas_model->data = $this->input->post();
 
 
		 // Image Upload Code Begins Here
		 $this->seva_image = array('upload_path' => SEVAS_PHOTO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		 $this->upload->initialize($this->seva_image);
		
		 if (!empty($_FILES['seva_image']['name']) && $this->upload->do_upload('seva_image')) {
			 $upload_data = $this->upload->data();
			 $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			 $gen_filename = "seva_image" . rand(1000000, 9999999) . "." . $file_Ext;
			 rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			 $this->sevas_model->data['seva_image'] = $gen_filename;
			 // $this->createthumbs(array($upload_data['file_name']));
		 } else {
		 
			 $data['form_error']['sevas_image'] = $this->upload->display_errors();
		 }
		
		 //Image Upload Code end here
		 if (!empty($sevas_id)) {
			 $this->sevas_model->data['modified_date'] = date('Y-m-d h:i:s');
			 $this->sevas_model->data['modified_by'] = $this->session->userdata('user_id');
			 $this->sevas_model->primary_key = array('sevas_id' => $sevas_id);
			 if ($this->sevas_model->update('sevas')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			 } else {
				 $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			 }
		 } else {
			 unset($this->sevas_model->data['sevas_id']);
			 $this->sevas_model->data['created_date'] = date('Y-m-d');
			 $this->sevas_model->data['created_by'] = $this->session->userdata('user_id');
			 if ($this->sevas_model->insert('sevas')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			 } else {
				 $data['query'] = (object) $this->input->sevas();
				 $data['view'] = "sevas/sevas_form";
				 $data['title'] = 'Administrator Dashboard';
				 $data['page_heading'] = 'Add/Edit seva';
				 $data['breadcrumb'] = "Add/Edit seva";
				 $data['scripts'] = array('assets/javascripts/' . 'sevas.js');
				 $this->load->view('templates/dashboard', $data);
				 $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			 }
		 }
 
		 $this->session->set_flashdata('msg', $msg);
		 redirect("sevas");
	 }

	 public function sevas_delete($sevas_id){
		$this->sevas_model->primary_key = array('sevas_id'=>$sevas_id);
		$this->sevas_model->delete('sevas');
		redirect('sevas');
	 }

    public function seva_categories(){
        $data['query'] = $this->sevas_model->view_data('seva_category');
		$data['view'] = 'sevas/category_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Seva Category List';
		$data['breadcrumb'] = 'Seva Category List';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }

    public function seva_category_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $category = $this->sevas_model-> pagination('seva_category');
        $data = array();

		foreach ($category->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->category_title,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="sevas/seva_category_edit/' . $row->seva_category_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="sevas/seva_category_delete/' . $row->seva_category_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $category->num_rows(),
			"recordsFiltered" => $category->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }

    public function seva_category_add(){
		$data['view'] = 'sevas/seva_category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Seva Category Form';
		$data['breadcrumb'] = 'Seva Category Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function seva_category_edit($seva_category_id){
        $this->sevas_model->primary = array('seva_category_id'=>$seva_category_id);
        $data['query'] = $this->sevas_model->get_row('seva_category');
		$data['view'] = 'sevas/seva_category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Seva Category Form';
		$data['breadcrumb'] = 'Seva Category Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }


    public function seva_category_save(){
        $seva_category_id =  $this->input->post('seva_category_id');
        $this->sevas_model->data['category_title'] = $category_title = $this->input->post('category_title');
        $this->sevas_model->data['category_description'] = $category_description = $this->input->post('category_description');
        $this->sevas_model->data['status_ind'] = $status_ind = $this->input->post('status_ind');
        
        if(!empty($seva_category_id)){ //Edit Case
            $this->sevas_model->data['modified_date'] = $modified_date = date('Y-m-d');
            $this->sevas_model->primary_key = ['seva_category_id'=>$seva_category_id];
            if($this->sevas_model->update('seva_category')){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
            }

        }else{ //Add Case

            $this->sevas_model->data['created_date'] = $created_date = date('Y-m-d');
           
            if($this->sevas_model->insert('seva_category')){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
       }
       $this->session->set_flashdata('msg', $msg);
       redirect('sevas/seva_categories');
    }

    public function seva_category_delete($seva_category_id){
        $this->sevas_model->primary_key = array('seva_category_id'=>$seva_category_id);
        if($this->sevas_model->delete('seva_category')){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Deleted Successfully');
        }else{
            $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('sevas/seva_categories');
     }

	 public function seva_pages(){
		$data['query'] = $this->sevas_model->view_data('sevas_page');
		$data['view'] = 'sevas/sevas_page_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Seva Page List';
		$data['breadcrumb'] = 'Seva Page List';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
	 }
	 public function create_seva_page(){
		$data['seva_categories'] = $this->sevas_model->view_data('seva_category');
		$data['forms'] = $this->sevas_model->view_data('forms');
		$data['page_type'] = $this->sevas_model->page_type();
        $data['templates'] = $this->sevas_model->view_data('templates');
		$data['view'] = 'sevas/sevas_page_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Sevas Page Form';
		$data['breadcrumb'] = 'Sevas Page Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function seva_page_edit($seva_page_id){
		
		$data['seva_categories'] = $this->sevas_model->view_data('seva_category');
		$data['forms'] = $this->sevas_model->view_data('forms');
		$this->sevas_model->primary_key = array('sevas_page_id'=>$seva_page_id);
		$seva_page = $this->sevas_model->get_row('sevas_page');
		$seva_page->seva_category_id = explode(',',$seva_page->seva_category_id);
        $data['query'] = $seva_page;
		$data['page_type'] = $this->sevas_model->page_type();
        $data['templates'] = $this->sevas_model->view_data('templates');
		$data['view'] = 'sevas/sevas_page_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Sevas Page Form';
		$data['breadcrumb'] = 'Sevas Page Form';
		$data['scripts'] = array('assets/javascripts/sevas.js');
		$this->load->view('templates/dashboard', $data);
    }
	public function sevas_page_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $category = $this->sevas_model-> pagination('sevas_page');
        $data = array();

		foreach ($category->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->sevas_page_title,
                $row->celebration_date,
                $row->seva_category_id,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="sevas/seva_page_edit/' . $row->sevas_page_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="sevas/seva_page_delete/' . $row->sevas_page_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $category->num_rows(),
			"recordsFiltered" => $category->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }

	public function sevas_page_save()
	 {
		 $sevas_page_id = $this->input->post('sevas_page_id');
		 $this->sevas_model->data = $this->input->post();
		$this->sevas_model->data['seva_category_id'] = implode(',',$this->input->post('seva_category_id'));
 
		 // Image Upload Code Begins Here
		 $this->seva_page_banner = array('upload_path' => SEVA_PAGE_BANNER_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		 $this->upload->initialize($this->seva_page_banner);
		
		 if (!empty($_FILES['seva_page_banner']['name']) && $this->upload->do_upload('seva_page_banner')) {
			 $upload_data = $this->upload->data();
			 $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			 $gen_filename = "seva_page_banner" . rand(1000000, 9999999) . "." . $file_Ext;
			 rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			 $this->sevas_model->data['seva_page_banner'] = $gen_filename;
			 // $this->createthumbs(array($upload_data['file_name']));
		 } else {
		 
			 $data['form_error']['seva_page_banner'] = $this->upload->display_errors();
		 }
		
		 //Image Upload Code end here
		 if (!empty($sevas_page_id)) {
			 $this->sevas_model->data['modified_date'] = date('Y-m-d h:i:s');
			 $this->sevas_model->data['modified_by'] = $this->session->userdata('user_id');
			 $this->sevas_model->primary_key = array('sevas_page_id' => $sevas_page_id);
			 if ($this->sevas_model->update('sevas_page')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
				} else {
					$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
				}
			} else {
			
				unset($this->sevas_model->data['sevas_page_id']);
				$this->sevas_model->data['created_date'] = date('Y-m-d');
				$this->sevas_model->data['created_by'] = $this->session->userdata('user_id');
				$this->sevas_model->data['modified_date'] = date('Y-m-d h:i:s');
				$this->sevas_model->data['modified_by'] = $this->session->userdata('user_id');
			 if ($this->sevas_model->insert('sevas_page')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			 } else {
				 $data['query'] = (object) $this->input->post();
				 $data['view'] = "sevas/sevas_page_form";
				 $data['title'] = 'Administrator Dashboard';
				 $data['page_heading'] = 'Add/Edit seva Page';
				 $data['breadcrumb'] = "Add/Edit seva Page";
				 $data['scripts'] = array('assets/javascripts/' . 'sevas.js');
				 $this->load->view('templates/dashboard', $data);
				 $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			 }
		 }
 
		 $this->session->set_flashdata('msg', $msg);
		 redirect("sevas/seva_pages");
	 }

}
