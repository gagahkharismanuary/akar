<?php 

class M_products extends CI_Model{

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
	
	function input_product($data,$table){
		$this->db->insert($table,$data);
	}

	function getProductDetail($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('product_id', $id);

		return $this->db->get();
	}

	function update_product($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}