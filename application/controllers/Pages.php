<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function view($page = 'home')
	{
		if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
			show_404();
		}

		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['title'] = 'Ask a question ! ';
			$this->load->view('inc/header_view',$data);
			$this->load->view('pages/'.$page,$data);
			$this->load->view('inc/footer_view');
		}
		else
		{
			$data['title'] = ucfirst($page);
			$this->load->view('inc/header_view');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('inc/footer_view');
		}
	}
	public function index(){
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$user_id = $session_data['id'];
		$data['questions'] = $this->question_model->get_ques();
		$data['title_ques'] = "Latest questions !";
		$data['title'] = 'Ask a question ! ';
		$this->form_validation->set_rules('username','User name','required');
		$this->form_validation->set_rules('topic','Topic','required');
		$this->form_validation->set_rules('question','Question','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('inc/header_view',$data);
			$this->load->view('pages/questions',$data);
			$this->load->view('inc/footer_view');
		}
		else{
			$this->question_model->insert_ques($user_id);
			redirect('pages');
		}

	}

}
