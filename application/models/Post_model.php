<?php

class Post_model extends CI_model {


  // get the last four posts
  public function get_posts($slug = FALSE)
  {
    if ($slug === FALSE)
    {
      $this->db->order_by('id','DESC');
      $query = $this->db->get('posts',4);
      return $query->result_array();
    }

    $query = $this->db->get_where('posts', array('slug' => $slug));
    return $query->row_array();
  }
  // get all posts
  public function get_all($slug = FALSE)
  {
    if ($slug === FALSE)
    {
      $this->db->order_by('id','DESC');
      $query = $this->db->get('posts');
      return $query->result_array();
    }

    $query = $this->db->get_where('posts', array('slug' => $slug));
    return $query->row_array();
  }
  // create function model
  public function create_post($file_name,$user_id){
    $slug = url_title($this->input->post('title'));

    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'img' => $file_name,
      'user_id' => $user_id
    );

    return $this->db->insert('posts',$data);
  }
  // delete function model
  public function delete_post($id){
    $this->db->where('id',$id);
    $this->db->delete('posts');
  }

  // Edit function model
  public function update_post(){
    $slug = url_title(convert_accented_characters($this->input->post('title'), 'dash', TRUE));
    // $slug = url_title($this->input->post('title'));
    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'img' => $this->input->post('userfile')
    );
    $this->db->where('id',$this->input->post('id'));
    return $this->db->update('posts',$data);
  }

}
