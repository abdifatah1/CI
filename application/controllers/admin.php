<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{



  function index()
  {

    if($this->session->userdata('logged_in'))
    {
      $this->load->library('pagination');
      $config['base_url'] = base_url() . 'admin';
      $config['total_rows'] = $this->db->get('posts')->num_rows();
      $config['per_page'] = 8;
      $config['use_page_numbers'] = TRUE;
      $config['attributes'] = array('class' => 'pagin' );
      $this->pagination->initialize($config);
      $query = $this->db->order_by('id','DESC')->get('posts',$config['per_page'],$this->uri->segment(3));
      $data['posts'] = $query->result_array();
      // $data['posts'] = $this->post_model->get_all();
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
    $username = $data['username'];
    $data['title'] = "Welcome $username ";
    $this->load->view('inc/header_view', $data);
    $this->load->view('profile_view', $data);
    $this->load->view('inc/footer_view');

  }
}
