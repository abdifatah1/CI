<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    // check if connected
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      if($session_data['admin']){
        var_dump($session_data['admin']);
        redirect('admin');
      }else {
        redirect('home');
      }

    }
    else
    {
      $data['title'] = 'Login';
      $this->load->view('inc/header_view');
      $this->load->view('login_view', $data);
      $this->load->view('inc/footer_view');
      // redirect('verifylogin');
    }

  }

}

?>
