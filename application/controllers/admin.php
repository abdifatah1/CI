<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public $data;
  public $session_data;
  function __construct(){
    parent::__construct();
    $session_data = $this->session->userdata('logged_in');
    $this->data = array(
      'username' => $session_data['username'],
      'admin' => $session_data['admin'],
      'id' => $session_data['id']
    );
  }

  function index()
  {

    if($this->session->userdata('logged_in'))
    {
      $this->load->library('pagination');
      $config['base_url'] = base_url() . 'admin/index';
      $config['total_rows'] = $this->db->get('posts')->num_rows();
      $config['use_page_numbers'] = TRUE;
      $config['attributes'] = array('class' => 'pagin' );
      $this->pagination->initialize($config);
      $per_page = $config['per_page'] = 8;
      $segment = $this->uri->segment(3);
      $this->data['posts'] = $this->post_model->get_pagination($per_page,$segment);
      $this->data['users'] = $this->user_model->get_users();
  
      $this->data['title'] = "Welcome to the admin page";
      $this->load->view('inc/header_view', $this->data);
      $this->load->view('admin_view', $this->data);
      $this->load->view('inc/footer_view');

    }
    else
    {
      redirect('login');
    }
  }
  public function delete($id)
  {
    $this->user_model->delete_user($id);
  }

  public function profile(){
    $user_id = $this->data['id'];
    $this->data['profile'] = $this->post_model->profile_posts($user_id);
    $username = $this->data['username'];

    $this->data['title'] = "Welcome $username ";
    $this->load->view('inc/header_view', $this->data);
    $this->load->view('profile_view', $this->data);
    $this->load->view('inc/footer_view');

  }
}
