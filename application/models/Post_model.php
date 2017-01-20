<?php

class Post_model extends CI_model {


  // get the last six posts
  public function get_posts($slug = FALSE)
  {
    if ($slug === FALSE)
    {
      $this->db->order_by('id','DESC');
      $query = $this->db->get('posts',6);
      return $query->result_array();
    }

    $query = $this->db->get_where('posts', array('slug' => $slug));
    return $query->row_array();
  }
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
  // pagination page
  public function get_pagination($per_page,$segment)
  {
    $this->db->order_by('id','DESC');
    $query = $this->db->get('posts', $per_page,$segment);
    return $query->result_array();
  }

  public function get_cat(){
    $query = $this->db->get('category');
    return $query->result_array();
  }
  public function get_cat_view($cat_id){
    $this->db->where('id',$cat_id);
    $query = $this->db->get('category');
    return $query->result_array();
  }

  // create function model
  public function create_post($file_name,$user_id){
    $slug = url_title($this->input->post('title'));

    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'img' => $file_name,
      'user_id' => $user_id,
      'category_id' =>$this->input->post('category')

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
    $slug = url_title(convert_accented_characters($this->input->post('title')));
    // $slug = url_title($this->input->post('title'));
    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'img' => $this->input->post('userfile'),
      'category_id' =>$this->input->post('category')
    );
    $this->db->where('id',$this->input->post('id'));
    return $this->db->update('posts',$data);
  }
  public function profile_posts( $user_id){
    $this->db->where('user_id',$user_id);
    $query = $this->db->get('posts');
    return $query->result();

  }
}
