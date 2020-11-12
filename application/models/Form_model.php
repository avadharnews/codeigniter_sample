<?php
class Form_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function auth_check($data)
    {
        $query = $this->db->get_where('shop_user', $data);
        if($query){   
         return $query->row();
        }
        return false;
    }
    public function insert_user($data)
    {
 
        $insert = $this->db->insert('shop_user', $data);
        if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
    }


    function saverecords($name,$email,$mobile)
	{
	$query="insert into users values('','$name','$email','$mobile')";
	$this->db->query($query);
	}
	
	function displayrecords()
	{
	$query=$this->db->query("select * from users");
	return $query->result();
	}
}