<?php 

class M_data extends CI_Model{
	function get_users(){
		return $this->db->get('profile');
	}

	function get_projects(){
		return $this->db->get('projects');
	}
}