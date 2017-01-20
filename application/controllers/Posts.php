<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public $data;
	public $session_data;
	// index method show lastest posts
	function __construct(){
		parent::__construct();
		$session_data = $this->session->userdata('logged_in');
		$this->data = array(
			'username' => $session_data['username'],
			'admin' => $session_data['admin'],
			'id' => $session_data['id']
		);
	}

	public function index()
	{

		$this->data['title'] = 'Latest posts';
		$this->data['posts'] = $this->post_model->get_posts();
		$this->load->view('inc/header_view',$this->data);
		$this->load->view('home_view', $this->data);
		$this->load->view('inc/footer_view');
	}
	// get all posts
	public function all_posts()
	{

		$this->load->library('pagination');
		$config['base_url'] = base_url().'posts/all_posts';
		$config['total_rows'] = $this->db->get('posts')->num_rows();
		$config['per_page'] = 6;
		$per_page = $config['per_page'];
		$segment = $this->uri->segment(3);
		$config['attributes'] = array('class' => 'pagin');
		$config['use_page_numbers'] = FALSE;
		$this->pagination->initialize($config);
		$this->data['posts'] = $this->post_model->get_pagination($per_page,$segment);


		$this->data['title'] = 'All posts';
		$this->load->view('inc/header_view',$this->data);
		$this->load->view('posts/index', $this->data);
		$this->load->view('inc/footer_view');
	}
	// methos show the selected article
	public function view($slug = NULL)
	{
		$this->data['post'] = $this->post_model->get_posts($slug);
				$cat_id = $this->data['post']['category_id'];
		$this->data['categories'] = $this->post_model->get_cat_view($cat_id);
		
		if(!empty($date['post']))	{
			show_404();
		}
		$this->data['title'] = $this->data['post']['title'];
		$this->load->view('inc/header_view',$this->data);
		$this->load->view('posts/view', $this->data);
		$this->load->view('inc/footer_view');
	}

	// create an article
	public function create()
	{
		if($this->session->userdata('logged_in')){
			$this->data['categories'] = $this->post_model->get_cat();
			$this->data['title'] = 'Create posts';
			//uploading image
			$config['upload_path']          = './assets/img';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['overwrite']            = TRUE;

			$this->load->library('upload', $config);
			if($this->form_validation->run('create') === FALSE){

				$this->load->view('inc/header_view',$this->data);
				$this->load->view('posts/create', $this->data);
				$this->load->view('inc/footer_view');
			}

			if (!$this->upload->do_upload())
			{
				// $this->load->view('posts/create');
			}

			else{
				$img = $this->upload->data();
				$user_id = $this->data['id'];
				$file_name = $img['file_name'];
				$this->post_model->create_post($file_name,$user_id);
				redirect('posts');

			}
		}
		else {
			$this->data['title'] = 'Please login to create a post !';
			$this->load->view('inc/header_view');
			$this->load->view('login_view',$this->data);
			$this->load->view('inc/footer_view');
		}
	}

	// delete an article
	public function delete($id){
		$this->post_model->delete_post($id);
		redirect('posts');
	}
	// edit article
	public function edit($slug){
		$this->data['categories'] = $this->post_model->get_cat();
		$this->data['post'] = $this->post_model->get_posts($slug);
		if(!empty($date['post']))	{
			show_404();
		}
		if($this->session->userdata('logged_in')){
			$this->data['title'] = 'Edit Post';
			$this->load->view('inc/header_view',$this->data);
			$this->load->view('posts/edit', $this->data);
			$this->load->view('inc/footer_view');
		}else {
			$this->load->view('inc/header_view');
			$this->load->view('login_view');
			$this->load->view('inc/footer_view');
		}
	}
	// update article
	public function update(){
		$this->post_model->update_post();
		redirect('posts');
	}
}
