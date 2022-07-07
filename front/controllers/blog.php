<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {
        public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('blog_model');
    }

    public function index() {
        $data = $this->data;
        $data['blog'] =  $this->blog_model->view_data('blog'); 
        $data['view_path'] =  'blog/posts'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }

    public function post($page_slug){
        $data = $this->data;
        $this->blog_model->primary_key = array('page_slug'=>$page_slug);
        $data['post'] =  $this->blog_model->view_rowdata('blog'); 
        $data['categories'] = $this->blog_model->view_data_random('blogcategory');
        $data['posts'] = $this->blog_model->view_posts_limit('blog');
        $data['view_path'] =  'blog/post_details'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }
    public function category($category_id){
        $data = $this->data;
        $this->blog_model->primary_key = array('category_id'=>$category_id);
        $data['blog'] =  $this->blog_model->getdata('blog'); 
        $data['view_path'] =  'blog/category'; 
        $data['scripts'] = array('assets/javascripts/index.js');
        $this->load->view('templates/blog_page', $data);
    }
}