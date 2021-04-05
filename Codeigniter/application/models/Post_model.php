<?php
class Post_model extends CI_Model{
	public function get_posts(){
		$query=$this->db->get('country');
		return $query->result_array();
	}

  public function create_Post(){
	  $data=[

    'country'=>$this->input->post('country')
	  ];
	  return $this->db->insert('country',$data);
  }

  public function can_login($email,$password){
  $this->db->where('email',$email);
  $this->db->where('password',$password);
  $query=$this->db->get('admin');
 if($query->num_rows() > 0){
	return true;

 }
 else{
	 return false;
 }
  }
}
	


?>
