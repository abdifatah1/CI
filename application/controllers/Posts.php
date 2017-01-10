<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Latest posts';

		$data['posts'] = $this->post_model->get_posts();
		$this->load->view('inc/header_view');
		$this->load->view('posts/index', $data);
		$this->load->view('inc/footer_view');
	}
	// select function
	public function view($slug = NULL)
	{
		$data['post'] = $this->post_model->get_posts($slug);
		if(!empty($date['post']))	{
			show_404();
		}
		$data['title'] = $data['post']['title'];
		$this->load->view('inc/header_view');
		$this->load->view('posts/view', $data);
		$this->load->view('inc/footer_view');
	}
	// create function
	public function create()
	{
		$data['title'] = 'Create posts';

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');
		$this->form_validation->set_rules('userfile','Image','required');
		//uploading image
		$config['upload_path']          = './assets/img';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']            = TRUE;

		$this->load->library('upload', $config);

		if($this->form_validation->run() === FALSE){
			$this->load->view('inc/header_view');
			$this->load->view('posts/create', $data);
			$this->load->view('inc/footer_view');
		}
		if ( ! $this->upload->do_upload())
		{
			// $this->load->view('posts/create');
		}
		else{
			$img = $this->upload->data();
			$file_name = $img['file_name'];
			$this->post_model->create_post($file_name);
			redirect('posts');

		}
	}
	// delete function
	public function delete($id){
		$this->post_model->delete_post($id);
		redirect('posts');
	}
	// edit function
	public function edit($slug){

		$data['post'] = $this->post_model->get_posts($slug);
		if(!empty($date['post']))	{
			show_404();
		}
		$data['title'] = 'Edit Post';
		$this->load->view('inc/header_view');
		$this->load->view('posts/edit', $data);
		$this->load->view('inc/footer_view');
	}
	public function update(){
		$this->post_model->update_post();
		redirect('posts');
	}
	public function testing(){
		$this->load->view('posts/edit');
	}





}
