<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Testimonials extends MY_Controller
{
    public function __construct()
	{
		parent::__construct();

		$this->load->model('testimonials_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
    }
    public function index()
	{
		$data['query'] = $this->testimonials_model->view("testimonials");
		$data['view'] = 'testimonials/testimonials_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Testimonials List';
		$data['breadcrumb'] = 'Testimonials List';
		$data['scripts'] = array('assets/javascripts/testimonials.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function testimonials_add()
	{
		$data['view'] = 'testimonials/testimonials_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Testimonials Image';
		$data['breadcrumb'] = 'Add Testimonials Image';
		$data['scripts'] = array('assets/javascripts/testimonials.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function testimonials_edit($testimonials_id)
	{

		$this->testimonials_model->primary_key = array('testimonials_id' => $testimonials_id);
		$data['query'] = $this->testimonials_model->get_row('testimonials');
		$data['view'] = 'testimonials/testimonials_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Testimonials';
		$data['breadcrumb'] = 'Edit Testimonials';
		$data['scripts'] = array('assets/javascripts/testimonials.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function testimonials_delete($testimonials_id, $testimonials_image,$user_image)
	{
		$this->testimonials_model->primary_key = array('testimonials_id' => $testimonials_id);
		if ($this->testimonials_model->delete('testimonials')) {
			unlink(TESTIMONIALS_IMAGE_PATH . $testimonials_image);
			unlink(TESTIMONIALS_IMAGE_PATH . $user_image);
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('testimonials');
	}

	public function testimonials_save()
	{

		$sess_user_id = $this->session->userdata('user_id');
		$testimonials_id = $this->input->post('testimonials_id');
		$this->testimonials_image = array('upload_path' => TESTIMONIALS_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->testimonials_image);
		if (!empty($_FILES['testimonials_image']['name']) && $this->upload->do_upload('testimonials_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "testimonials_image_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->testimonials_model->data['testimonials_image'] = $gen_filename;
		} else {
			$data['form_error']['testimonials_image'] = $this->upload->display_errors();
		}
		$this->user_image = array('upload_path' => TESTIMONIALS_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->user_image);
		if (!empty($_FILES['user_image']['name']) && $this->upload->do_upload('user_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "user_image_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->testimonials_model->data['user_image'] = $gen_filename;
		} else {
			$data['form_error']['user_image'] = $this->upload->display_errors();
		}

		if (empty($testimonials_id)) { //add Case


			$this->testimonials_model->data['testimonials_comment']	= $this->input->post('testimonials_comment');
			$this->testimonials_model->data['fullname']	= $this->input->post('fullname');
			$this->testimonials_model->data['city']	= $this->input->post('city');
			$this->testimonials_model->data['products_id']	= $this->input->post('products_id');
			$this->testimonials_model->data['product_category_id']	= $this->input->post('product_category_id');
			$this->testimonials_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->testimonials_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->testimonials_model->data['created_by']	= $sess_user_id;
			$this->testimonials_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->testimonials_model->insert('testimonials')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
            unset($this->testimonials_model->data['testimonials_id']);
            $this->testimonials_model->data['testimonials_comment']	= $this->input->post('testimonials_comment');
            $this->testimonials_model->data['fullname']	= $this->input->post('fullname');
			$this->testimonials_model->data['city']	= $this->input->post('city');
            $this->testimonials_model->data['products_id']	= $this->input->post('products_id');
			$this->testimonials_model->data['product_category_id']	= $this->input->post('product_category_id');
            $this->testimonials_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->testimonials_model->data['status_ind']	= $this->input->post('status_ind');
			$this->testimonials_model->primary_key = array('testimonials_id' => $testimonials_id);
			if ($this->testimonials_model->update('testimonials')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('testimonials');
	}




	public function testimonials_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$testimonials = $this->testimonials_model->get_pagination('testimonials');

		$data = array();
		foreach ($testimonials->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->fullname,
				$row->created_date,
				$row->modified_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="testimonials/testimonials_edit/' . $row->testimonials_id . '">
					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
					<a class="red" title="Delete" href="testimonials/testimonials_delete/' . $row->testimonials_id . '/' . $row->testimonials_image .'/'.$row->user_image. '"> 
					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;


					</div></td>
				'

			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $testimonials->num_rows(),
			"recordsFiltered" => $testimonials->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
}