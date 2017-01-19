<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
  public   $data;
  public $session_data;
  public function __construct()
  {

    parent::__construct();
    //Codeigniter : Write Less Do More
  $this->session_data = $this->session->userdata('logged_in');
  $this->data['username'] = $this->session_data['username'];
  $this->data['admin'] = $this->session_data['admin'];

  }

  function index()
  {
    $this->data['results'] = $this->question_model->search_articles();
    $this->data['title'] = 'Search List';
    $this->load->view('inc/header_view', $this->data);
    $this->load->view('search_view', $this->data);
    $this->load->view('inc/footer_view',$this->data);

  }

}
