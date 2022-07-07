<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Blog extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
    }

    function index()//index page
    {
        $data['query'] = $this->blog_model->view("posts");	
        $data['view'] = 'blog/list';
		$data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Blog List';
        $data['breadcrumb'] = 'Blog List';
        $data['scripts'] = array('assets/javascripts/blog.js');
        $this->load->view('templates/dashboard', $data);
    }
   
    public function posts_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$blog = $this->blog_model->get_pagination('posts');

		$data = array();
		foreach ($blog->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->post_title,
				$row->created_date,
				$row->modified_date,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="blog/post_edit/' . $row->post_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="blog/post_delete/' . $row->post_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $blog->num_rows(),
			"recordsFiltered" => $blog->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
    }
    
    public function post_add()
	{
		$data['query'] = $this->blog_model->view('posts');
		$data['categories'] = $this->blog_model->view('post_category');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'blog/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Post';
		$data['breadcrumb'] = 'Add Post';
		$data['scripts'] = array('assets/javascripts/blog.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function post_edit($post_id)
	{
		$this->blog_model->primary_key = array('post_id' => $post_id);
		$data['query'] = $this->blog_model->get_row('posts');
		$data['categories'] = $this->blog_model->view('post_category');
		$data['view'] = 'blog/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Post';
		$data['breadcrumb'] = 'Edit Post';
		$data['scripts'] = array('assets/javascripts/blog.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function post_delete($post_id, $post_image)
	{
		$this->blog_model->primary_key = array('banner_id' => $post_id);
		if ($this->blog_model->delete('posts')) {
			unlink(BLOG_PHOTO_UPLOAD_PATH . $post_image);
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('blog/posts');
	}

	public function posts_save()
	{
		$post_id = $this->input->post('post_id');
		$this->blog_model->data = $this->input->post();


		// Image Upload Code Begins Here
		$this->post_image = array('upload_path' => BLOG_PHOTO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->post_image);
		if (!empty($_FILES['post_image']['name']) && $this->upload->do_upload('post_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "post_image" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->blog_model->data['post_image'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {
		
			$data['form_error']['post_image'] = $this->upload->display_errors();
		}
		//Image Upload Code end here
		if (!empty($post_id)) {
			$this->blog_model->data['modified_date'] = date('Y-m-d h:i:s');
			$this->blog_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->blog_model->primary_key = array('post_id' => $post_id);
			if ($this->blog_model->update('posts')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->blog_model->data['post_id']);
			$this->blog_model->data['created_date'] = date('Y-m-d h:i:s');
			$this->blog_model->data['created_by'] = $this->session->userdata('user_id');
			if ($this->blog_model->insert('posts')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "blog/form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Post';
				$data['breadcrumb'] = "Add/Edit Post";
				$data['scripts'] = array('assets/javascripts/' . 'blog.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("blog");
	}

	public function category_view(){
		$data['query'] = $this->blog_model->view('post_category');	
		$data['view'] = 'blog/category_list';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Blog category list';
        $data['page_heading'] = 'Blog Category List';
        $data['scripts'] = array('assets/javascripts/blog.js');
        $this->load->view('templates/dashboard', $data);
	}
	
	public function category_add(){
		$data['query'] = $this->blog_model->view('post_category');		
		$data['view'] = 'blog/category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Blog category add';
        $data['page_heading'] = 'Blog category add';
        $data['scripts'] = array('');
        $this->load->view('templates/dashboard', $data);
	}
	
	public function category_edit($category_id){
		$this->blog_model->primary_key = array('category_id' => $category_id);
		$data['query'] = $this->blog_model->get_row('post_category');		
		$data['view'] = 'blog/category_form';
		$data['breadcrumb'] = 'Blog category edit';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Blog category edit';
        $data['scripts'] = array('');
        $this->load->view('templates/dashboard', $data);
	}

	public function category_delete($category_id){
		$this->blog_model->primary_key = array('category_id' => $category_id);
		if($this->blog_model->delete('post_category')){
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		}else{
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg',$msg);
		redirect('blog/category_view');
	}
	
	public function category_save(){
		$sess_user_id = $this->session->userdata('user_id');		
		$id = $this->input->post('category_id');
		
		$this->form_validation->set_rules('category_name','category name', 'required');
		
		if($this->form_validation->run()){
			$this->blog_model->data = $this->input->post();
			if(empty($id)){//add Case
				$this->blog_model->data['created_date'] = date('Y-m-d h:i:s');
				$this->blog_model->data['created_by'] = $this->session->userdata('user_id');
				if ($this->blog_model->insert('post_category')) {
				
	            	$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
	            } else {
	            	$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
	            }			
			}else{//edit Case
				unset($this->blog_model->data['id']);				
				$this->blog_model->primary_key = array('category_id' => $id);
				if ($this->blog_model->update('post_category')){
	            	$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
	            }else{
	                $msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
	            }
			}
			$this->session->set_flashdata('msg',$msg);
			redirect('blog/category_view');
		}else{
			$data['query'] = (object) $this->input->post();			
			$data['view'] = 'blog/category_form';
			$data['title'] = 'Administrator Dashboard';
			$data['breadcrumb'] = 'Blog category form';
	        $data['page_heading'] = 'Blog category form';
	        $data['scripts'] = array('');
	        $this->load->view('templates/dashboard', $data);
		}		
	}

	public function category_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$Blog = $this->blog_model->get_pagination('post_category');
		
		$data = array();
		foreach($Blog->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$substr = substr($row->category_desc,0,80);
		
			$data[] = array(
				$row->category_name,
				$row->created_date,
				$status,
				'
					<td><div class="action-buttons">

					<a class="" title="Edit" href="blog/category_edit/' . $row->category_id.'">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="blog/category_delete/' . $row->category_id.'"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'
			
			);

		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" =>$Blog->num_rows(),
			"recordsFiltered" =>$Blog->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
	   exit();
	
}
}