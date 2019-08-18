<?php 

class M_data extends CI_Model{
	function get_users(){
		return $this->db->get('user');
	}
}