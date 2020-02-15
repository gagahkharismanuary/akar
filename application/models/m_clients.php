<?php 

class M_clients extends CI_Model{
	function get_clients(){
		return $this->db->get('clients')->result();
    }
    
    function input_clients($data,$table){
		$this->db->insert($table,$data);
    }
    
    function update_clients($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    
    function getClientDetail($id)
	{
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->where('client_id', $id);

		return $this->db->get();
	}
}