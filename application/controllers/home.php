<?php
class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      redirect('posts');

    }
    else
    {
      //If no session, redirect to login page
      redirect('login/index', 'refresh');
    }
  }

  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home/index', 'refresh');
  }

}

?>
