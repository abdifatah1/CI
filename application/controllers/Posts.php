<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {


	// index method show lastest posts
	public function index()
	{

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['admin'] = $session_data['admin'];
		$data['title'] = 'Latest posts';

		$data['posts'] = $this->post_model->get_posts();
		$this->load->view('inc/header_view',$data);
		$this->load->view('home_view', $data);
		$this->load->view('inc/footer_view');
	}
	// get all posts
	public function all_posts()
	{

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['admin'] = $session_data['admin'];
		$data['title'] = 'All posts';
		$data['posts'] = $this->post_model->get_all();
		$this->load->view('inc/header_view',$data);
		$this->load->view('posts/index', $data);
		$this->load->view('inc/footer_view');
	}
	// methos show the selected article
	public function view($slug = NULL)
	{
		$data['post'] = $this->post_model->get_posts($slug);
		if(!empty($date['post']))	{
			show_404();
		}

		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['admin'] = $session_data['admin'];

		$data['title'] = $data['post']['title'];
		$this->load->view('inc/header_view',$data);
		$this->load->view('posts/view', $data);
		$this->load->view('inc/footer_view');

	}
	// create an article
	public function create()
	{
		if($this->session->userdata('logged_in')){
			$data['title'] = 'Create posts';
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['id'] = $session_data['id'];
			$data['admin'] = $session_data['admin'];

			$this->form_validation->set_rules('title','Title','trim|required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('body','Body','required');
			$this->form_validation->set_rules('userfile','Image');
			//uploading image
			$config['upload_path']          = './assets/img';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['overwrite']            = TRUE;

			$this->load->library('upload', $config);
			if($this->form_validation->run() === FALSE){

				$this->load->view('inc/header_view',$data);
				$this->load->view('posts/create', $data);
				$this->load->view('inc/footer_view');
			}

			if (!$this->upload->do_upload())
			{
				// $this->load->view('posts/create');
			}

			else{
				$img = $this->upload->data();
				$user_id = $data['id'];
				$file_name = $img['file_name'];
				$this->post_model->create_post($file_name,$user_id);
				redirect('posts');

			}
		}
		else {
			$data['title'] = 'Please login to create a post !';
			$this->load->view('inc/header_view');
			$this->load->view('login_view',$data);
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

		$data['post'] = $this->post_model->get_posts($slug);
		if(!empty($date['post']))	{
			show_404();
		}
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['admin'] = $session_data['admin'];

			$data['title'] = 'Edit Post';
			$this->load->view('inc/header_view',$data);
			$this->load->view('posts/edit', $data);
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
