<?php

$config = array(
  'login' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'trim|required|callback_check_database'
    ),

  ),
  'register' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'trim|is_unique[users.username]|required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'confirmationp',
      'label' => 'Password confirmation',
      'rules' => 'trim|required'
    )

  ),
  'create' => array(
    array(
      'field' => 'title',
      'label' => 'Title',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'body',
      'label' => 'Body',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'userfile',
      'label' => 'Image',
      'rules' => 'trim'
    )

  ),
  'questions' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'topic',
      'label' => 'Topic',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'question',
      'label' => 'Question',
      'rules' => 'trim|required'
    )

  ),
  'contact' => array(
    array(
      'field' => 'fname',
      'label' => 'First name',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'lname',
      'label' => 'Last name',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'subject',
      'label' => 'Subject',
      'rules' => 'trim|required'
    ),
    array(
      'field' => 'message',
      'label' => 'Message',
      'rules' => 'trim|required'
    )

  ),
  'search' => array(

    array(
      'field' => 'search',
      'label' => 'Search',
      'rules' => 'trim|required'
    )

  ),
);
