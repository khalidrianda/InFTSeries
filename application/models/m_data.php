<?php 

class M_data extends CI_Model{

	public function detail_data($id = NULL){
		return $query = $this->db->query("SELECT * FROM  bandwidth WHERE id_projek = ".$id);
	}

	public function detail_interval($id = NULL){
		return $query = $this->db->query("SELECT * FROM  nilai_linguistik WHERE id_projek = ".$id);
	}

	public function detail_cheng($id = NULL){
		return $query = $this->db->query("SELECT * FROM  nilai_cheng WHERE id_projek = ".$id);
	}

	public function detail_hasil($id = NULL){
		return $query = $this->db->query("SELECT * FROM  hasil_akhir WHERE id_projek = ".$id);
	}

	public function detail_hasila($id = NULL){
		return $this->db->query("SELECT * FROM  hasil_akhir WHERE id_projek = ".$id);
	}

	public function detail_ket($id = NULL){
		return $query1 = $this->db->query("SELECT * FROM  projek WHERE id = ".$id);
	}

	public function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function input_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_id($id){
		return $this->db->get_where('bandwidth', $id);
	}

	public function min($id = NULL){
		return $this->db->query("SELECT min(jumlah) as min FROM  bandwidth WHERE id_projek = ".$id);
	}

	public function max($id = NULL){
		return $this->db->query("SELECT max(jumlah) as max FROM  bandwidth WHERE id_projek = ".$id);
	}
}