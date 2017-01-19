<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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

	public function view($page = 'home')
	{
		if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
			show_404();
		}

		if($this->session->userdata('logged_in'))
		{

			$this->data['title'] = 'Ask a question ! ';
			$this->load->view('inc/header_view',$this->data);
			$this->load->view('pages/'.$page,$this->data);
			$this->load->view('inc/footer_view');
		}
		else
		{
			$this->data['title'] = ucfirst($page);
			$this->load->view('inc/header_view');
			$this->load->view('pages/'.$page, $this->data);
			$this->load->view('inc/footer_view');
		}
	}
	public function index(){

		$user_id = $this->data['id'];
		$this->data['questions'] = $this->question_model->get_ques();
		$this->data['title_ques'] = "Latest questions !";
		$this->data['title'] = 'Ask a question ! ';

		if ($this->form_validation->run('questions') === FALSE) {
			$this->load->view('inc/header_view',$this->data);
			$this->load->view('pages/questions',$this->data);
			$this->load->view('inc/footer_view');
		}
		else{
			$this->question_model->insert_ques($user_id);
			redirect('pages');
		}

	}

}
