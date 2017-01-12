<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{



  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['title'] = "Welcome to the admin page";
      $data['admin'] = $session_data['admin'];
      $this->load->view('inc/header_view', $data);
      $this->load->view('admin_view', $data);
      $this->load->view('inc/footer_view');

    }
    else
    {
      redirect('login');
    }
  }


}
