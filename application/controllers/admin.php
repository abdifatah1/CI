<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{



  function index()
  {

    if($this->session->userdata('logged_in'))
    {
      $data['posts'] = $this->post_model->get_posts();
      $data['users'] = $this->user_model->get_users();
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
  public function delete($id)
  {
    $this->user_model->delete_user($id);
  }

  public function profile(){
    $session_data = $this->session->userdata('logged_in');
    $user_id = $session_data['id'];
    $data['profile'] = $this->post_model->profile_posts($user_id);
    $data['username'] = $session_data['username'];
    $data['title'] = "Welcome to the profile page";
    $this->load->view('inc/header_view', $data);
    $this->load->view('profile_view', $data);
    $this->load->view('inc/footer_view');
  }
}
