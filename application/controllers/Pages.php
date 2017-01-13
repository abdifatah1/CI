<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

	public function view($page = 'home')
	{
		if(!file_exists(APPPATH. 'views/pages/'.$page.'.php')){
			show_404();
		}

		if($this->session->userdata('logged_in'))
		{

			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['title'] = ucfirst($page);
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



}
