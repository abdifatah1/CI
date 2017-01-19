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
    if($this->form_validation->run('login') == FALSE)
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
      redirect('login', 'refresh');
    }

  }
  public function register()
  {
    //  user connected
  $session_data = $this->session->userdata('logged_in');
    //This method will have the credentials validation

      if($this->form_validation->run('register') == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['title'] = "Register";
      $data['username'] = $session_data['username'];
      $this->load->view('inc/header_view',$data);
      $this->load->view('register',$data);
      $this->load->view('inc/footer_view');
    }
    else
    {

      $this->user_model->register_user();
      redirect('login', 'refresh');
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
