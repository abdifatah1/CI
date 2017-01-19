<?php
class Contact extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['admin'] = $session_data['admin'];

    //run validation on form input
    if ($this->form_validation->run('contact') == FALSE)
    {
      //validation fails
      $this->load->view('inc/header_view',$data);
      $this->load->view('contact_view',$data);
      $this->load->view('inc/footer_view');
    }
    else
    {
      //get the form data
      $fname = $this->input->post('fname');
      $lname = $this->input->post('lname');
      $from_email = $this->input->post('email');
      $subject = $this->input->post('subject');
      $message = $this->input->post('message');

      //set to_email id to which you want to receive mails
      $to_email = 'abdifatah.ibrahim@gmail.com';


      //send mail
      $this->email->from($from_email, $fname);
      $this->email->to($to_email);
      $this->email->subject($subject);
      $this->email->message($message);
      var_dump($this->email->send());
      var_dump($this->email->send());
      var_dump($this->email->send());
      var_dump($this->email->send());
      if ($this->email->send())
      {
        // mail sent

        $suc = $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');

        // var_dump($suc);
        $this->load->view('inc/header_view');
        $this->load->view('contact_view');
        $this->load->view('inc/footer_view');
      }
      else
      {
        //error
        $er = $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');


        $this->load->view('inc/header_view');
        $this->load->view('contact_view');
        $this->load->view('inc/footer_view');
      }
    }
  }

}
