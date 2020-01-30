<?php 

class M_projects extends CI_Model{

	function get_projects(){
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->join('category','category.category_id=projects.category_id');		
		$this->db->join('clients','clients.client_id=projects.client_id');		
		$this->db->join('products','products.product_id=projects.products_id');		
		$this->db->join('status','status.status_id=projects.status_id');		
		$query = $this->db->get();
		return $query->result();
	}

	function getAllCategory()
    {
        $query = $this->db->query('SELECT category_name, category_id FROM category');
        return $query;
	}
}