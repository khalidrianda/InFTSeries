<?php 

class M_projek extends CI_Model{
	public function tampil_data(){
		return $this->db->get_where('projek', ['email' => $this->session->userdata('email')]);
	}

	public function tampil_dashboard(){
		return $this->db->get('projek');
	}

	public function input_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function hapus_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function hapus_alldata($wher, $table){
		$this->db->where($wher);
		$this->db->delete($table);
	}
	

	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_keyword($keyword , $email){
		$this->db->where($email);
		$this->db->select('*');
		$this->db->from('projek');
		$this->db->like('title_projek', $keyword);
		$this->db->or_like('tipe', $keyword);
		$this->db->or_like('ket', $keyword);
		return $this->db->get()->result();
	}

	public function update_peramalan($id, $peramalan, $tipee){
		$this->db->query("UPDATE projek SET peramalan = $peramalan WHERE id = ".$id);	
		$this->db->query("UPDATE projek SET tipe='$tipee' WHERE id = ".$id);	
	}

	public function ada_data($id, $data_aktual){
		$this->db->query("UPDATE projek SET data_aktual = $data_aktual WHERE id = ".$id);
	}
}