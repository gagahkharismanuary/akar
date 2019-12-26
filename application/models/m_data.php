<?php 

class M_data extends CI_Model{
	function get_users(){
		return $this->db->get('profile');
	}

	function get_projects(){
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->join('category','category.category_id=projects.category_id');		
		$query = $this->db->get();
		return $query->result();
	}

	function getAllCategory()
    {
        $query = $this->db->query('SELECT category_name, category_id FROM category');
        return $query;
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function getProjectDetail($id)
	{
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->where('projects_id', $id);

		return $this->db->get();
	}
}