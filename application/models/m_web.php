<?php 

class M_web extends CI_Model{

	function get_products(){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('category','category.category_id=products.category_id');		
		$query = $this->db->get();
		return $query->result();
	}

	function getAllCategory()
    {
        $query = $this->db->query('SELECT category_name, category_id FROM category');
        return $query;
	}
}