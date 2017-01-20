<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function insert_ques($user_id){
    $data = array(
      'username' => $this->input->post('username'),
      'topic' => $this->input->post('topic'),
      'question' => $this->input->post('question'),
      'user_id' => $user_id
    );

    return $this->db->insert('questions',$data);
  }
  public function get_ques(){
    $this->db->order_by('id','DESC');
    $query = $this->db->get('questions');
    return $query->result_array();
  }
  public function search_articles(){

    $search = $this->input->post('search');
    $this->db->like('title',$search);
    $this->db->or_like('slug',$search);
    $this->db->or_like('body',$search);
    $this->db->or_like('category_name',$search);
    $this->db->join('category','category.id = posts.category_id');
    $query = $this->db->get('posts');
    return $query->result_array();
  }

}
