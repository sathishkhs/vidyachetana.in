<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Master extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('master_model');
		$this->load->model('admin_users_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function countries()
	{
		$data['query'] = $this->master_model->view('countries');
		$data['view'] = 'country/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Country List';
		$data['breadcrumb'] = 'Country List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function country_add()
	{
		$data['query'] = $this->master_model->view('countries');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'country/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Country';
		$data['breadcrumb'] = 'Add Country';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function country_edit($country_id)
	{
		$this->master_model->primary_key = array('country_id' => $country_id);
		$data['query'] = $this->master_model->get_row('countries');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'country/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Country';
		$data['breadcrumb'] = 'Edit Country';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function country_delete($country_id)
	{
		$this->master_model->primary_key = array('country_id' => $country_id);
		if ($this->master_model->delete('countries')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/countries');
	}

	public function country_save()
	{
		$country_id = $this->input->post('country_id');
		if (empty($country_id)) { //add Case

			$this->master_model->data['country_name']	= $this->input->post('country_name');
			$this->master_model->data['country_code']	= $this->input->post('country_code');
			$this->master_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->master_model->insert('countries')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
			unset($this->master_model->data['country_id']);
			$this->master_model->primary_key = array('country_id' => $country_id);
			$this->master_model->data['country_name']	= $this->input->post('country_name');
			$this->master_model->data['country_code']	= $this->input->post('country_code');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');
			if ($this->master_model->update('countries')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/countries');
	}


	public function states()
	{
		$data['query'] = $this->master_model->view('states');
		$data['view'] = 'state/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'state List';
		$data['breadcrumb'] = 'state List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function state_add()
	{
		$data['query'] = $this->master_model->view('states');
		$data['countries'] = $this->master_model->view('countries');
		$data['view'] = 'state/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add state';
		$data['breadcrumb'] = 'Add state';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function state_edit($state_id)
	{
		$this->master_model->primary_key = array('state_id' => $state_id);
		$data['query'] = $this->master_model->get_row('states');
		$data['countries'] = $this->master_model->view('countries');
		$data['view'] = 'state/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit State';
		$data['breadcrumb'] = 'Edit State';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function state_delete($state_id)
	{
		$this->master_model->primary_key = array('state_id' => $state_id);
		if ($this->master_model->delete('states')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/states');
	}

	public function state_save()
	{
		$state_id = $this->input->post('state_id');
		if (empty($state_id)) { //add Case

			$this->master_model->data['state_name']	= $this->input->post('state_name');
			$this->master_model->data['state_code']	= $this->input->post('state_code');
			$this->master_model->data['country_id']	= $this->input->post('country_id');
			$this->master_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->master_model->insert('states')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
			unset($this->master_model->data['state_id']);
			$this->master_model->primary_key = array('state_id' => $state_id);
			$this->master_model->data['state_name']	= $this->input->post('state_name');
			$this->master_model->data['state_code']	= $this->input->post('state_code');
			$this->master_model->data['country_id']	= $this->input->post('country_id');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');
			if ($this->master_model->update('states')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/states');
	}


	public function cities()
	{
		$data['query'] = $this->master_model->view('cities');
		$data['view'] = 'city/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'City List';
		$data['breadcrumb'] = 'City List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function city_add()
	{
		$data['query'] = $this->master_model->view('cities');

		$data['states'] = $this->master_model->view('states');
		$data['view'] = 'city/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add City';
		$data['breadcrumb'] = 'Add City';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function city_edit($city_id)
	{
		$this->master_model->primary_key = array('city_id' => $city_id);
		$data['query'] = $this->master_model->get_row('cities');

		$data['states'] = $this->master_model->view('states');
		$data['view'] = 'city/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit City';
		$data['breadcrumb'] = 'Edit City';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function city_delete($city_id)
	{
		$this->master_model->primary_key = array('city_id' => $city_id);
		if ($this->master_model->delete('cities')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/cities');
	}

	public function city_save()
	{
		$city_id = $this->input->post('city_id');
		if (empty($city_id)) { //add Case

			$this->master_model->data['city_name']	= $this->input->post('city_name');
			$this->master_model->data['city_code']	= $this->input->post('city_code');

			$this->master_model->data['state_id']	= $this->input->post('state_id');
			$this->master_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->master_model->insert('cities')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
			unset($this->master_model->data['city_id']);
			$this->master_model->primary_key = array('city_id' => $city_id);
			$this->master_model->data['city_name']	= $this->input->post('city_name');
			$this->master_model->data['city_code']	= $this->input->post('city_code');

			$this->master_model->data['state_id']	= $this->input->post('state_id');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');
			if ($this->master_model->update('cities')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('country/cities');
	}


	public function country_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$countries = $this->master_model->get_pagination('countries');

		$data = array();
		foreach ($countries->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->country_name,
				$row->country_code,
				$row->created_date,
				$row->modified_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="master/country_edit/' . $row->country_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="master/country_delete/' . $row->country_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $countries->num_rows(),
			"recordsFiltered" => $countries->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function state_list()
	{
		$draw = $this->input->post("draw");
		$start = $this->input->post("start");
		$length = $this->input->post("length");
		$states = $this->master_model->get_pagination('states');

		$data = array();
		foreach ($states->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->state_name,
				$row->state_code,
				$row->created_date,
				$row->modified_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="master/state_edit/' . $row->state_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="master/state_delete/' . $row->state_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $states->num_rows(),
			"recordsFiltered" => $states->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function city_list()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$cities = $this->master_model->get_pagination('cities');
		$data = array();

		foreach ($cities->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->city_name,
				$row->city_code,
				$row->created_date,
				$row->modified_date,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="master/city_edit/' . $row->city_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="master/city_delete/' . $row->city_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $cities->num_rows(),
			"recordsFiltered" => $cities->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	}


	public function banners()
	{
		$data['query'] = $this->master_model->view('banners');
		$data['view'] = 'banners/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Banners List';
		$data['breadcrumb'] = 'Banners List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function banner_add()
	{
		$data['query'] = $this->master_model->view('banners');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'banners/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Banner';
		$data['breadcrumb'] = 'Add Banner';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function banner_edit($banner_id)
	{
		$this->master_model->primary_key = array('banner_id' => $banner_id);
		$data['query'] = $this->master_model->get_row('banners');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'banners/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Banner';
		$data['breadcrumb'] = 'Edit Banner';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function banner_delete($banner_id, $banner_background_img_path)
	{
		$this->master_model->primary_key = array('banner_id' => $banner_id);
		if ($this->master_model->delete('banners')) {
			unlink(BANNERS_PHOTO_UPLOAD_PATH . $banner_background_img_path);
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/banners');
	}

	public function banner_save()
	{
		$banner_id = $this->input->post('banner_id');
		$this->master_model->data = $this->input->post();


		// Image Upload Code Begins Here
		$this->banner_background_img_path = array('upload_path' => BANNERS_PHOTO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->banner_background_img_path);
		if (!empty($_FILES['banner_background_img_path']['name']) && $this->upload->do_upload('banner_background_img_path')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "banner_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->master_model->data['banner_background_img_path'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
			$data['form_error']['banner_background_img_path'] = $this->upload->display_errors();
		}
		//Image Upload Code end here
		if (!empty($banner_id)) {
			$this->master_model->data['last_modified_date'] = date('Y-m-d');
			$this->master_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->master_model->primary_key = array('banner_id' => $banner_id);
			if ($this->master_model->update('banners')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->master_model->data['banner_id']);
			$this->master_model->data['created_date'] = date('Y-m-d');
			$this->master_model->data['created_by'] = $this->session->userdata('user_id');
			if ($this->master_model->insert('banners')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "banners/form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Banner';
				$data['breadcrumb'] = "Add/Edit Banner";
				$data['scripts'] = array('assets/javascripts/' . 'master.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("master/banners");
	}
	public function removeimg($banner_id, $banner_background_img_path)
	{

		if (!empty($banner_id)) {
			$this->master_model->primary_key = array('banner_id' => $banner_id);
			if ($this->master_model->update_image($banner_id)) {
				unlink(BANNERS_PHOTO_UPLOAD_PATH . $banner_background_img_path);
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Image Removed Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Remove.');
			}
			$this->session->set_flashdata('msg', $msg);
			redirect("/$this->class_name/");
		}
	}
	public function banner_list()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$banners = $this->master_model->get_pagination('banners');

		$data = array();

		foreach ($banners->result() as $row) {
			if (!empty($row->banner_background_img_path) && file_exists('./' . BANNERS_PHOTO_UPLOAD_PATH . $row->banner_background_img_path)) {
			$banner_image =	'<img src="'. BANNERS_PHOTO_UPLOAD_PATH . $row->banner_background_img_path.'" width="50">';
			}
			$modified_by = ($row->modified_by == 0) ? $row->created_by : $row->modified_by;
			$this->admin_users_model->primary_key = array('user_id'=>$modified_by);
			$modified_by = $this->admin_users_model->get_row()->username;
			
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$date =  ($row->last_modified_date == "") ?  $row->created_date : $row->last_modified_date;
			$data[] = array(
				$row->banner_top_text,
				$banner_image,
				$modified_by,
				$date,
				$status,
				'
			<td><div class="action-buttons">
			<a class="" title="Edit" href="master/banner_edit/' . $row->banner_id . '">
			<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="master/banner_delete/' . $row->banner_id . '"> 
			<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
			</div></td>
			');
			}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $banners->num_rows(),
			"recordsFiltered" => $banners->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	}


    public function getslug($model, $field, $text) {///
        $this->load->model($model);
        $slug = $this->$model->get_slug(urldecode($text), $field, $this->session->userdata('lang_id'));
        $result = array("field_id" => $field, "field_val" => $slug);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

	public function pages()
	{
		$data['query'] = $this->master_model->view_pages('pages');
		$data['view'] = 'pages/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'pages List';
		$data['breadcrumb'] = 'pages List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function pages_add()
	{
		$data['query'] = $this->master_model->view('pages');
		$data['page_type'] = $this->master_model->page_type();
		$data['templates'] = $this->master_model->view('templates');
		$data['facilities'] = $this->master_model->get_rowdata('facilities');
		// $data['forms'] = $this->master_model->view('form');
		$data['view'] = 'pages/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Pages';
		$data['breadcrumb'] = 'Add Pages';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function pages_edit($page_id)
	{
		$this->master_model->primary_key = array('page_id' => $page_id);
		$data['page_type'] = $this->master_model->page_type();
		$pages = $this->master_model->get_row('pages');
		$pages->facilities_id = explode(',',$pages->facilities_id);
		$data['query'] = $pages;
		
		$data['templates'] = $this->master_model->view('templates');
		$data['forms'] = $this->master_model->view('form');
		$data['view'] = 'pages/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Pages';
		$data['breadcrumb'] = 'Edit Pages';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function pages_delete($page_id, $photo_path)
	{
		$this->master_model->primary_key = array('page_id' => $page_id);
		if ($this->master_model->delete('pages')) {
			unlink(BANNERS_PHOTO_UPLOAD_PATH . $photo_path);
			$msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/pages');
	}
	public function pages_save()
	{
		$page_id = $this->input->post('page_id');
		$this->master_model->data = $this->input->post();


		// Image Upload Code Begins Here
		$this->banner_image = array('upload_path' => BANNER_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->banner_image);
		if (!empty($_FILES['banner_image']['name']) && $this->upload->do_upload('banner_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "banner_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->master_model->data['banner_image'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
			$data['form_error']['banner_image'] = $this->upload->display_errors();
		}
		$this->video_image = array('upload_path' => PAGES_VIDEO_IMAGE_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->video_image);
		if (!empty($_FILES['video_image']['name']) && $this->upload->do_upload('video_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "video_image_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->master_model->data['video_image'] = $gen_filename;
		} else {
			$data['form_error']['video_image'] = $this->upload->display_errors();
		}
		$this->video_url = array('upload_path' => PAGES_VIDEO_URL_PATH, 'allowed_types' => 'wmv|mp4|avi|mov|mkv');
		$this->upload->initialize($this->video_url);
		if (!empty($_FILES['video_url']['name']) && $this->upload->do_upload('video_url')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "video_url_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->master_model->data['video_url'] = $gen_filename;
		} else {
			$data['form_error']['video_url'] = $this->upload->display_errors();
		}
	
	        $facilities = $this->input->post('facilities_id');
            $this->master_model->data['facilities_id'] = implode(',',$facilities);
		//Image Upload Code end here
		if (!empty($page_id)) {
			$this->master_model->data['last_modified_date'] = date('Y-m-d');
			$this->master_model->data['last_modified_by'] = $this->session->userdata('user_id');
			$this->master_model->primary_key = array('page_id' => $page_id);
			if ($this->master_model->update('pages')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->master_model->data['page_id']);
			$this->master_model->data['created_date'] = date('Y-m-d');
			$this->master_model->data['created_by'] = $this->session->userdata('user_id');
			if ($this->master_model->insert('pages')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "pages/form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Page';
				$data['breadcrumb'] = "Add/Edit Page";
				$data['scripts'] = array('assets/javascripts/' . 'master.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("master/pages");
	}

	public function pages_removeimg($page_id, $photo_path)
	{

		if (!empty($page_id)) {
			$this->master_model->primary_key = array('page_id' => $page_id);
			if ($this->master_model->update_photo_image($page_id)) {
				unlink(BANNERS_PHOTO_UPLOAD_PATH . $photo_path);
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Image Removed Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Remove.');
			}
			$this->session->set_flashdata('msg', $msg);
			redirect("master/pages");
		}
	}

	public function pages_list(){

		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$pages = $this->master_model->get_pagination('pages');

		$data = array();

		foreach ($pages->result() as $row) {
			
			$modified_by = ($row->modified_by == 0) ? $row->created_by : $row->modified_by;
			$this->admin_users_model->primary_key = array('user_id'=>$modified_by);
			$modified_by = $this->admin_users_model->get_row()->username;
			
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$date =  ($row->last_modified_date == "") ?  $row->created_date : $row->last_modified_date;
			$data[] = array(
				$row->page_title,
				$row->type_name,
				$row->page_slug,
				$modified_by,
				$date,
				$status,
			
				'
			<td><div class="action-buttons">
			<a class="" title="Edit" href="master/pages_edit/' . $row->page_id . '">
			<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="master/pages_delete/' . $row->page_id . '"> 
			<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
			</div></td>
			');
			}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $pages->num_rows(),
			"recordsFiltered" => $pages->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	
	}
	public function settings()
	{
		$data['query'] = $this->master_model->settings('settings');
		$data['view'] = 'settings/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Settings Form';
		$data['breadcrumb'] = 'Settings Form';
		$data['scripts'] = array('');
		$this->load->view('templates/dashboard', $data);
	}


	public function settings_update()
	{

		$data_all = array(
			'setting_value' => $this->input->post('setting_value'),
			'setting_id' => $this->input->post('setting_id'),
		);

		foreach ($data_all['setting_id'] as $key => $sid) {
			$this->settings_path = array('upload_path' => SETTINGS_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
			$this->upload->initialize($this->settings_path);
			if (!empty($_FILES['setting_value_' . $key]['name']) && $this->upload->do_upload('setting_value_' . $key)) {
				$upload_data = $this->upload->data();
				$data_all['setting_value'][$key] = $upload_data['file_name'];
			}
			if (empty($data_all['setting_value'][$key])) {
			}
		}

		foreach ($data_all['setting_id'] as $key => $sid) {
			$status = true;
			$this->master_model->data = array('setting_id' => $sid, 'setting_value' => !empty($data_all['setting_value'][$key]) ? $data_all['setting_value'][$key] : '');
			$this->master_model->primary_key = array('setting_id' => $sid);
			if (!$this->master_model->is_exist('settings')) {
				$this->db->query("INSERT INTO `settings`( `setting_id`, `type`, `setting_key`, `setting_name`, `setting_value`, `status_ind`)
                            SELECT `setting_id`, `type`, `setting_key`, `setting_name`, `setting_value`, `status_ind` FROM `settings` WHERE `setting_id` = $sid");
			}
			$this->master_model->primary_key = array('setting_id' => $sid);
			if (!$this->master_model->update('settings')) {
				$status = false;
			}
		}
		if ($status) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Save Changes Updated Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/settings/');
	}

	public function widgets()
	{
		$data['query'] = $this->master_model->widgets_view('widgets');
		$data['view'] = 'widgets/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Widgets List';
		$data['breadcrumb'] = 'Widgets List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function widgets_add()
	{
		$data['query'] = $this->master_model->view('widgets');
		$data['templates'] = $this->master_model->view('templates');
		$data['area'] = $this->master_model->view('widget_areas');
		$data['view'] = 'widgets/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Widgets';
		$data['breadcrumb'] = 'Add Widgets';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function widgets_edit($widget_id)
	{
		$this->master_model->primary_key = array('widget_id' => $widget_id);
		$data['query'] = $this->master_model->get_row('widgets');
		$data['templates'] = $this->master_model->view('templates');
		$data['area'] = $this->master_model->view('widget_areas');
		$data['view'] = 'widgets/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Pages';
		$data['breadcrumb'] = 'Edit Pages';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function widgets_delete($widget_id, $content_image)
	{
		$this->master_model->primary_key = array('widget_id' => $widget_id);
		if ($this->master_model->delete('widgets')) {
			unlink(WIDGETS_UPLOAD_PATH . $content_image);
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/widgets');
	}
	public function widgets_save()
	{
		$widget_id = $this->input->post('widget_id');
		$this->master_model->data = $this->input->post();


		// Image Upload Code Begins Here
		$this->content_image = array('upload_path' => WIDGETS_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->content_image);
		if (!empty($_FILES['content_image']['name']) && $this->upload->do_upload('content_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "Content_image_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->master_model->data['content_image'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
			$data['form_error']['content_image'] = $this->upload->display_errors();
		}
		//Image Upload Code end here
		if (!empty($widget_id)) {
			$this->master_model->data['last_modified_date'] = date('Y-m-d');
			$this->master_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->master_model->primary_key = array('widget_id' => $widget_id);
			if ($this->master_model->update('widgets')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->master_model->data['widget_id']);
			$this->master_model->data['created_date'] = date('Y-m-d');
			$this->master_model->data['created_by'] = $this->session->userdata('user_id');
			if ($this->master_model->insert('widgets')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "widgets/form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Widgets';
				$data['breadcrumb'] = "Add/Edit Widgets";
				$data['scripts'] = array('assets/javascripts/' . 'master.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("master/widgets");
	}

	public function menuitems()
	{
		$data['query'] = $this->master_model->view_menu('menuitems')->result();
		$data['view'] = 'menuitems/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Menu Items List';
		$data['breadcrumb'] = 'Menu Items List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function menu_list()
	{
		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$menus = $this->master_model->view_menu('menuitems');

		$data = array();

		foreach ($menus->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$date =  ($row->last_modified_date == "") ?  $row->created_date : $row->last_modified_date;
			$data[] = array(
				$row->menu_name,
				substr(strip_tags($row->menuitem_text), 0, 40),
				substr(strip_tags($row->menuitem_link), 0, 40),
				$row->display_order,
				$date,
				$status,
				'
			<td><div class="action-buttons">
			<a class="" title="Edit" href="master/menuedit/' . $row->menuitem_id . '">
			<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="master/menudelete/' . $row->menuitem_id . '"> 
			<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
			</div></td>
			'

			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $menus->num_rows(),
			"recordsFiltered" => $menus->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	}

	public function menuitem_add()
	{
		$data['menu'] = $this->master_model->view('menus');
		$data['menuitems'] = $this->master_model->view('menuitems');
		$data['view'] = 'menuitems/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Menu Item';
		$data['breadcrumb'] = 'Add Menu Item';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}
	public function menuedit($menuitem_id)
	{
		$data['menu'] = $this->master_model->view('menus');
		$data['menuitems'] = $this->master_model->view('menuitems');
		$this->master_model->primary_key = array('menuitem_id' => $menuitem_id);
		$data['query'] = $this->master_model->get_row('menuitems');
		$data['view'] = 'menuitems/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Menu';
		$data['breadcrumb'] = 'Edit Menu';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function menudelete($menuitem_id)
	{
		$this->master_model->primary_key = array('menuitem_id' => $menuitem_id);
		if ($this->master_model->delete('menuitems')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/menuitems');
	}
	public function menuitem_save()
	{
// print_r($this->input->post());exit;
		$menuitem_id = $this->input->post('menuitem_id');
		if ($_POST['parent_menuitem_id'] == '' && empty($POST['parent_menuitem_id'])) {
			$parent_menuitem_id = null;
		} else {
			$parent_menuitem_id = $this->input->post('parent_menuitem_id');
		}
		if (empty($menuitem_id)) { //add Case

			$this->master_model->data['menu_id']	= $this->input->post('menu_id');
			$this->master_model->data['parent_menuitem_id']	= $parent_menuitem_id;
			$this->master_model->data['menuitem_text']	= $this->input->post('menuitem_text');
			$this->master_model->data['menuitem_link']	= $this->input->post('menuitem_link');
			$this->master_model->data['menuitem_target']	= $this->input->post('menuitem_target');

			$this->master_model->data['display_order']	= $this->input->post('display_order');
			$this->master_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['last_modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['last_modified_by']	= $this->session->userdata('user_id');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->master_model->insert('menuitems')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
			unset($this->master_model->data['menuitem_id']);
			$this->master_model->primary_key = array('menuitem_id' => $menuitem_id);
			$this->master_model->data['menu_id']	= $this->input->post('menu_id');
			$this->master_model->data['parent_menuitem_id']	= $parent_menuitem_id;
			$this->master_model->data['menuitem_text']	= $this->input->post('menuitem_text');
			$this->master_model->data['menuitem_link']	= $this->input->post('menuitem_link');
			$this->master_model->data['menuitem_target']	= $this->input->post('menuitem_target');
			$this->master_model->data['last_modified_by']	= $this->session->userdata('user_id');
			$this->master_model->data['display_order']	= $this->input->post('display_order');
			$this->master_model->data['last_modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');
			if ($this->master_model->update('menuitems')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/menuitems');
	}

	public function features()
	{
		$data['query'] = $this->master_model->view('features');
		$data['view'] = 'features/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'features List';
		$data['breadcrumb'] = 'features List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function feature_add()
	{
		$data['query'] = $this->master_model->view('features');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'features/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Feature';
		$data['breadcrumb'] = 'Add Feature';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function feature_edit($feature_id)
	{
		$this->master_model->primary_key = array('feature_id' => $feature_id);
		$data['query'] = $this->master_model->get_row('features');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'features/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Feature';
		$data['breadcrumb'] = 'Edit Feature';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function feature_delete($feature_id)
	{
		$this->master_model->primary_key = array('feature_id' => $feature_id);
		if ($this->master_model->delete('features')) {

			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/features');
	}

	public function feature_save()
	{
		$feature_id = $this->input->post('feature_id');
		$this->master_model->data = $this->input->post();



		if (!empty($feature_id)) {
			$this->master_model->data['last_modified_date'] = date('Y-m-d');
			$this->master_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->master_model->primary_key = array('feature_id' => $feature_id);
			if ($this->master_model->update('features')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->master_model->data['feature_id']);
			$this->master_model->data['created_date'] = date('Y-m-d');
			$this->master_model->data['created_by'] = $this->session->userdata('user_id');
			if ($this->master_model->insert('features')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "features/form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Feature';
				$data['breadcrumb'] = "Add/Edit Feature";
				$data['scripts'] = array('assets/javascripts/' . 'master.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("master/features");
	}

	public function features_list(){

		$draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$features = $this->master_model->get_pagination('features');

		$data = array();

		foreach ($features->result() as $row) {
			
			$modified_by = ($row->modified_by == 0) ? $row->created_by : $row->modified_by;
			$this->admin_users_model->primary_key = array('user_id'=>$modified_by);
			$modified_by = $this->admin_users_model->get_row()->username;
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$date =  ($row->last_modified_date == "") ?  $row->created_date : $row->last_modified_date;
			$data[] = array(
				$row->feature_title,
				$date,
				$modified_by,
				$status,
			
				'
			<td><div class="action-buttons">
			<a class="" title="Edit" href="master/features_edit/' . $row->feature_id . '">
			<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
			<a class="red" title="Delete" href="master/features_delete/' . $row->feature_id . '"> 
			<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
			</div></td>
			');
			}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $features->num_rows(),
			"recordsFiltered" => $features->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;
	
	}
	public function form()
	{
		$data['query'] = $this->master_model->view('form');
		$data['view'] = 'form/list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'form List';
		$data['breadcrumb'] = 'form List';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function form_add()
	{
		$data['query'] = $this->master_model->view('form');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'form/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add form';
		$data['breadcrumb'] = 'Add form';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function form_edit($form_id)
	{
		$this->master_model->primary_key = array('form_id' => $form_id);
		$data['query'] = $this->master_model->get_row('form');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'form/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit form';
		$data['breadcrumb'] = 'Edit form';
		$data['scripts'] = array('assets/javascripts/master.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function form_delete($form_id)
	{
		$this->master_model->primary_key = array('form_id' => $form_id);
		if ($this->master_model->delete('form')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/form');
	}

	public function form_save()
	{
		$form_id = $this->input->post('form_id');
		if (empty($form_id)) { //add Case

			$this->master_model->data['form_name']	= $this->input->post('form_name');
			$this->master_model->data['form_path']	= $this->input->post('form_path');
			$this->master_model->data['table_name']	= $this->input->post('table_name');
			$this->master_model->data['created_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['created_by']	= $this->session->userdata('user_id');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');

			if ($this->master_model->insert('form')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
			}
		} else { //edit Case
			unset($this->master_model->data['form_id']);
			$this->master_model->primary_key = array('form_id' => $form_id);
			$this->master_model->data['form_name']	= $this->input->post('form_name');
			$this->master_model->data['form_path']	= $this->input->post('form_path');
			$this->master_model->data['table_name']	= $this->input->post('table_name');
			$this->master_model->data['modified_date']	= date('Y-m-d h:i:s');
			$this->master_model->data['status_ind']	= $this->input->post('status_ind');
			if ($this->master_model->update('form')) {
				$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
			}
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('master/form');
	}
	public function form_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$form = $this->master_model->get_pagination('form');

		$data = array();
		foreach ($form->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->form_name,
				$row->created_date,
				$row->modified_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="master/form_edit/' . $row->form_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="master/form_delete/' . $row->form_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $form->num_rows(),
			"recordsFiltered" => $form->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	
	

}


