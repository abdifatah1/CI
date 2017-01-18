<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['admin'] = $session_data['admin'];
    $data['title'] = 'Search List';
    $this->load->view('inc/header_view', $data);
    $this->load->view('search_view', $data);
    $this->load->view('inc/footer_view', $data);
  }

}
