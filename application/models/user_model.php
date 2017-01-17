<?php
Class User_model extends CI_Model
{
  function login($username, $password)
  {
    $this -> db -> select('id, username,admin, password');
    $this -> db -> from('users');
    $this -> db -> where('username', $username);
    $this -> db -> where('password', MD5($password));
    $this -> db -> limit(1);

    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
  public function get_users(){
    $this->db->select('id,username,admin');
    $query = $this->db->get('users');
    return $query->result_array();
  }
  // register function
  public function register_user(){
    $pass = md5($this->input->post('password'));
    $confirm = MD5($this->input->post('confirmationp'));
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $pass,
      'confirmation' => $confirm
    );

    return $this->db->insert('users',$data);
  }
  // delete user function
  public function delete_user($id){
    $this->db->where('id', $id);

    if($this->db->delete('users')){
      redirect('admin');

    }
  }
  
}
?>
