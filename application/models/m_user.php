<?php 

class M_user extends CI_Model{

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_user(){
		return $this->db->get('user');
	}
}