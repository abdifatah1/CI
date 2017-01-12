<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model','',TRUE);
  }

  public function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['title'] = 'Login';
      $this->load->view('inc/header_view',$data);
      $this->load->view('login_view');
      $this->load->view('inc/footer_view');
    }
    else
    {
      //Go to private area
      redirect('home', 'refresh');
    }

  }
  public function register()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[users.username]|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('confirmationp', 'password confirmation', 'trim|required');

    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['title'] = "Register";
      $this->load->view('inc/header_view');
      $this->load->view('register',$data);
      $this->load->view('inc/footer_view');
    }
    else
    {

      $this->user_model->register_user();
      // redirect('home', 'refresh');
    }

  }

  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->user_model->login($username, $password);

    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->username,
          'admin' => $row->admin
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }
}
?>
