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

	function index() //index page
	{
		$data['query'] = $this->blog_model->view("blog");
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
		$blog = $this->blog_model->get_pagination('blog');

		$data = array();
		foreach ($blog->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$data[] = array(
				$row->title,
				$row->created_at,
				$row->updated_at,
				$status,
				'
                    <td><div class="action-buttons">

					<a class="" title="Edit" href="blog/post_edit/' . $row->id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="blog/post_delete/' . $row->id . '"> 

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
		$data['query'] = $this->blog_model->view('blog');
		$data['categories'] = $this->blog_model->view('blogcategory');
		$data['authors'] = $this->blog_model->view('author');
		// $data['categories'] = $this->project_model->get_categories();
		$data['view'] = 'blog/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Add Post';
		$data['breadcrumb'] = 'Add Post';
		$data['scripts'] = array('assets/javascripts/blog.js', '../js-plugins/summernote/summernote-lite.min.js',);
		$this->load->view('templates/dashboard', $data);
	}

	public function post_edit($post_id)
	{
		$this->blog_model->primary_key = array('id' => $post_id);
		$data['query'] = $this->blog_model->get_row('blog');
		$data['categories'] = $this->blog_model->view('blogcategory');
		$data['authors'] = $this->blog_model->view('author');
		$data['view'] = 'blog/form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Post';
		$data['breadcrumb'] = 'Edit Post';
		$data['scripts'] = array('assets/javascripts/blog.js', '../js-plugins/summernote/summernote-lite.min.js',);
		$this->load->view('templates/dashboard', $data);
	}

	public function post_delete($post_id, $post_image = '')
	{
		$this->blog_model->primary_key = array('id' => $post_id);
		if ($this->blog_model->delete('blog')) {
			unlink(BLOG_PHOTO_UPLOAD_PATH . $post_image);
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('blog');
	}

	public function posts_save()
	{
		$id = $this->input->post('id');
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
		if (!empty($id)) {
			$this->blog_model->data['updated_at'] = date('Y-m-d h:i:s');
			// $this->blog_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->blog_model->primary_key = array('id' => $id);
			if ($this->blog_model->update('blog')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->blog_model->data['id']);
			$this->blog_model->data['created_at'] = date('Y-m-d h:i:s');
			if ($this->blog_model->insert('blog')) {
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

	public function category_view()
	{
		$data['query'] = $this->blog_model->view('blogcategory');
		$data['view'] = 'blog/category_list';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Blog category list';
		$data['page_heading'] = 'Blog Category List';
		$data['scripts'] = array('assets/javascripts/blog.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function category_add()
	{
		$data['query'] = $this->blog_model->view('blogcategory');
		$data['view'] = 'blog/category_form';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Blog category add';
		$data['page_heading'] = 'Blog category add';
		$data['scripts'] = array('');
		$this->load->view('templates/dashboard', $data);
	}

	public function category_edit($category_id)
	{
		$this->blog_model->primary_key = array('category_id' => $category_id);
		$data['query'] = $this->blog_model->get_row('blogcategory');
		$data['view'] = 'blog/category_form';
		$data['breadcrumb'] = 'Blog category edit';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Blog category edit';
		$data['scripts'] = array('');
		$this->load->view('templates/dashboard', $data);
	}

	public function category_delete($category_id)
	{
		$this->blog_model->primary_key = array('category_id' => $category_id);
		if ($this->blog_model->delete('blogcategory')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('blog/category_view');
	}

	public function category_save()
	{
		$sess_user_id = $this->session->userdata('user_id');
		$id = $this->input->post('category_id');

		$this->form_validation->set_rules('category_name', 'category name', 'required');

		if ($this->form_validation->run()) {
			$this->blog_model->data = $this->input->post();
			if (empty($id)) { //add Case
				$this->blog_model->data['created_at'] = date('Y-m-d h:i:s');
				// $this->blog_model->data['created_by'] = $this->session->userdata('user_id');
				if ($this->blog_model->insert('blogcategory')) {

					$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data Added Successfully');
				} else {
					$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to save.');
				}
			} else { //edit Case
				unset($this->blog_model->data['category_id']);
				$this->blog_model->primary_key = array('category_id' => $id);
				if ($this->blog_model->update('blogcategory')) {
					$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data updated successfully.');
				} else {
					$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to Update.');
				}
			}
			$this->session->set_flashdata('msg', $msg);
			redirect('blog/category_view');
		} else {
			$data['query'] = (object) $this->input->post();
			$data['view'] = 'blog/category_form';
			$data['title'] = 'Administrator Dashboard';
			$data['breadcrumb'] = 'Blog category form';
			$data['page_heading'] = 'Blog category form';
			$data['scripts'] = array('');
			$this->load->view('templates/dashboard', $data);
		}
	}

	public function category_list()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$Blog = $this->blog_model->get_pagination('blogcategory');

		$data = array();
		foreach ($Blog->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$substr = substr($row->category_desc, 0, 80);

			$data[] = array(
				$row->category_name,
				$row->created_at,
				$status,
				'
					<td><div class="action-buttons">

					<a class="" title="Edit" href="blog/category_edit/' . $row->category_id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="blog/category_delete/' . $row->category_id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $Blog->num_rows(),
			"recordsFiltered" => $Blog->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function upload_editor_image()
	{

		if ($_FILES['file']['name']) {
			if (!$_FILES['file']['error']) {
				$name = md5(rand(100, 200));
				$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$filename = $name .
					'.' . $ext;
				$destination = POST_PHOTO_UPLOAD_PATH . $filename; //change this directory
				$location = $_FILES["file"]["tmp_name"];
				move_uploaded_file($location, $destination);
				echo POST_PHOTO_UPLOAD_PATH . $filename; //change this URL
			} else {
				echo $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['file']['error'];
			}
		}
	}

	public function delete_editor_image()
	{
		$src = $this->input->post('src'); // $src = $_POST['src'];
		$file_name = str_replace(base_url(), '', $src); // striping host to get relative path
		$filename = explode('/', $src);

		if (unlink(POST_PHOTO_UPLOAD_PATH . $filename[7])) {
			echo 'File Delete Successfully';
		}
	}


	public function getslug($model, $field, $text) {///
        $this->load->model($model);
        $slug = $this->$model->get_slug(urldecode($text), $field, $this->session->userdata('lang_id'));
        $result = array("field_id" => $field, "field_val" => $slug);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

	public function authors(){
	
		$data['view'] = 'blog/authors_list';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Authors list';
		$data['page_heading'] = 'Authors List';
		$data['scripts'] = array('assets/javascripts/blog.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function authors_list(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$authors = $this->blog_model->get_pagination('author');

		$data = array();
		foreach ($authors->result() as $row) {
				$data[] = array(
				$row->name,
				$row->email,
				$row->mobile,
				$row->created_at,
				'
					<td><div class="action-buttons">

					<a class="" title="Edit" href="blog/edit_author/' . $row->id . '">

					<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;

					<a class="red" title="Delete" href="blog/delete_author/' . $row->id . '"> 

					<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;

					</div></td>
				'

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $authors->num_rows(),
			"recordsFiltered" => $authors->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function add_author()
	{
		$data['query'] = $this->blog_model->view('author');
		$data['view'] = 'blog/author_form';
		$data['title'] = 'Administrator Dashboard';
		$data['breadcrumb'] = 'Add Author';
		$data['page_heading'] = 'Add Author';
		$data['scripts'] = array('');
		$this->load->view('templates/dashboard', $data);
	}

	public function edit_author($id)
	{
		$this->blog_model->primary_key = array('id' => $id);
		$data['query'] = $this->blog_model->get_row('author');
		$data['view'] = 'blog/category_form';
		$data['breadcrumb'] = 'Edit Author';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Edit Author';
		$data['scripts'] = array('');
		$this->load->view('templates/dashboard', $data);
	}

	public function delete_author($id)
	{
		$this->blog_model->primary_key = array('id' => $id);
		if ($this->blog_model->delete('author')) {
			$msg = array('type' => 'success', 'icon' => 'lni lni-thumbs-up lni-lg mr-2', 'txt' => 'Data deleted Successfully');
		} else {
			$msg = array('type' => 'danger', 'icon' => 'lni lni-thumbs-down lni-lg mr-2', 'txt' => 'Sorry! Unable to delete.');
		}
		$this->session->set_flashdata('msg', $msg);
		redirect('blog/authors');
	}

	public function author_save()
	{
		$id = $this->input->post('id');
		$this->blog_model->data = $this->input->post();


		// Image Upload Code Begins Here
		$this->image = array('upload_path' => AUTHOR_PHOTO_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->image);
		if (!empty($_FILES['image']['name']) && $this->upload->do_upload('image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "image" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->blog_model->data['image'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {

			$data['form_error']['image'] = $this->upload->display_errors();
		}

		
		//Image Upload Code end here
		if (!empty($id)) {
			$this->blog_model->data['updated_at'] = date('Y-m-d h:i:s');
			// $this->blog_model->data['modified_by'] = $this->session->userdata('user_id');
			$this->blog_model->primary_key = array('id' => $id);
			if ($this->blog_model->update('author')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			} else {
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			}
		} else {
			unset($this->blog_model->data['id']);
			$this->blog_model->data['created_at'] = date('Y-m-d h:i:s');
			
			if ($this->blog_model->insert('author')) {
				$msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			} else {
				$data['query'] = (object) $this->input->post();
				$data['view'] = "blog/author_form";
				$data['title'] = 'Administrator Dashboard';
				$data['page_heading'] = 'Add/Edit Author';
				$data['breadcrumb'] = "Add/Edit Author";
				$data['scripts'] = array('assets/javascripts/' . 'blog.js');
				$this->load->view('templates/dashboard', $data);
				$msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			}
		}

		$this->session->set_flashdata('msg', $msg);
		redirect("blog/authors");
	}

}
