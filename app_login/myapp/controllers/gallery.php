<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    error_reporting(E_ALL);
ini_set("display_errors", 1);
class Gallery extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('gallery_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		
		$data['view'] = 'gallery/gallery_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Gallery List';
		$data['breadcrumb'] = 'Gallery List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
	}
    public function create_gallery(){
        $data['view'] = 'gallery/create_gallery';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Create Gallery';
		$data['breadcrumb'] = 'Create Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_edit($id){
		$this->gallery_model->primary_key = array('gallery_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('gallery');
        $data['view'] = 'gallery/create_gallery';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Gallery';
		$data['breadcrumb'] = 'Edit Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_list(){

        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery = $this->gallery_model->get_pagination('gallery');

		$data = array();
		foreach ($gallery->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
                $row->gallery_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/gallery_edit/' . $row->gallery_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/gallery_delete/' . $row->gallery_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery->num_rows(),
			"recordsFiltered" => $gallery->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();

    }
    public function gallery_save(){
        $this->gallery_model->data = $this->input->post();
        $gallery_id = $this->input->post('gallery_id');

		$this->gallery_img = array('upload_path' => GALLERY_IMG_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->gallery_img);
		
		if (!empty($_FILES['gallery_img']['name']) && $this->upload->do_upload('gallery_img')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_img_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_img'] = $gen_filename;
		}
        if(!empty($gallery_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('gallery_id'=>$gallery_id);
			if ($this->gallery_model->update('gallery')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery');
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery');
    }

    public function gallery_delete($id){
        $this->gallery_model->primary_key = array('gallery_id'=>$id);
        $res = $this->gallery_model->delete('gallery');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery');
    }

    public function gallery_categories(){
        $data['view'] = 'gallery/category_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Category List';
		$data['breadcrumb'] = 'Category List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_category_list(){
        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery_category = $this->gallery_model->get_pagination('gallery_category');

		$data = array();
		foreach ($gallery_category->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$this->gallery_model->primary_key = array('gallery_id'=>$row->gallery_id);
            $gallery_name = $this->gallery_model->get_row('gallery')->gallery_name;
            $data[] = array(
                $row->category_name,
                $gallery_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/category_edit/' . $row->category_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/category_delete/' . $row->category_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery_category->num_rows(),
			"recordsFiltered" => $gallery_category->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }

    public function category_delete($id){
        $this->gallery_model->primary_key = array('category_id'=>$id);
        $res = $this->gallery_model->delete('gallery_category');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_categories');
    }
    public function add_category(){
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['view'] = 'gallery/category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Category';
		$data['breadcrumb'] = 'Add Category';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function category_edit($category_id){
		$this->gallery_model->primary_key = array('category_id'=>$category_id);
		$data['query'] = $this->gallery_model->get_row('gallery_category');
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['view'] = 'gallery/category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Category';
		$data['breadcrumb'] = 'Add Category';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function category_save(){
        $this->gallery_model->data = $this->input->post();
        $category_id = $this->input->post('category_id');
        if(!empty($category_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('category_id'=>$category_id);
			if ($this->gallery_model->update('gallery_category')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery_category');
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_categories');
    }
    
    public function gallery_images(){
        $data['view'] = 'gallery/gallery_images_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Gallery Images List';
		$data['breadcrumb'] = 'Gallery Images List';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_image_list(){
        $draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$gallery_images = $this->gallery_model->get_pagination('gallery_images');

		$data = array();
		foreach ($gallery_images->result() as $row) {
                 
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$this->gallery_model->primary_key = array('gallery_id'=>$row->gallery_id);
            $gallery_name = $this->gallery_model->get_row('gallery')->gallery_name;
			if(!empty($row->category_id)){
			$this->gallery_model->primary_key = array('category_id'=>$row->category_id);
            $category_name = $this->gallery_model->get_row('gallery_category')->category_name;
			}
            $data[] = array(
                $row->image_name,
                $gallery_name,
                $category_name,
                $row->created_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="gallery/gallery_image_edit/' . $row->gallery_img_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="gallery/gallery_image_delete/' . $row->gallery_img_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $gallery_images->num_rows(),
			"recordsFiltered" => $gallery_images->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }
    public function add_images(){
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['categories'] = $this->gallery_model->view('gallery_category');
        $data['view'] = 'gallery/gallery_images_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Images to Gallery';
		$data['breadcrumb'] = 'Add Images to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function gallery_image_edit($id){
		$this->gallery_model->primary_key = array('gallery_img_id'=>$id);
		$data['query'] = $this->gallery_model->get_row('gallery_images');
        $data['galleries'] = $this->gallery_model->view('gallery');
        $data['categories'] = $this->gallery_model->view('gallery_category');
        $data['view'] = 'gallery/gallery_images_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Images to Gallery';
		$data['breadcrumb'] = 'Add Images to Gallery';
		$data['scripts'] = array('assets/javascripts/gallery.js');
		$this->load->view('templates/dashboard', $data);
    }

    public function gallery_img_save(){
        $this->gallery_model->data = $this->input->post();
        $gallery_img_id = $this->input->post('gallery_img_id');
   
        $this->gallery_img_path = array('upload_path' => GALLERY_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->gallery_img_path);
		if (!empty($_FILES['gallery_img_path']['name']) && $this->upload->do_upload('gallery_img_path')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "gallery_img_" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->gallery_model->data['gallery_img_path'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
			$data['form_error']['gallery_img_path'] = $this->upload->display_errors();
		}
	
        if(!empty($gallery_img_id)){ //Edit Case
			$this->gallery_model->data['modified_date'] = date('Y-m-d');
			$this->gallery_model->primary_key = array('gallery_img_id'=>$gallery_img_id);
			if ($this->gallery_model->update('gallery_images')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
        }else{ //Add case
            $this->gallery_model->data['created_date'] = date('Y-m-d');
            $this->gallery_model->data['modified_date'] = date('Y-m-d');
            // unset($this->gallery_model->data['gallery_id']);
            $res = $this->gallery_model->insert('gallery_images');
        
            if($res == true){
                $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
            }else{
                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
            }
        }
        $this->load->helper('url');
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_images');
    }
	public function gallery_image_delete($id){
        $this->gallery_model->primary_key = array('gallery_img_id'=>$id);
        $res = $this->gallery_model->delete('gallery_images');
        if($res == true){
            $msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
        }else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
        $this->session->set_flashdata('msg',$msg);
        redirect('gallery/gallery_images');
    }
     
}