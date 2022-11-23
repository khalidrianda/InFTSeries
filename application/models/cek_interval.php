<?php


class Cek_interval extends CI_Model {
	public function cek_interval($id){
		$where = array('id_projek' => $id);
		$query = $this->db->get_where('bandwidth', $where)->result();
		
		foreach ($query as $qry) {
			$data_band[] = $qry->jumlah;
		}
		
		$jml = 0;
		for($i=0; $i<(count($data_band)-1); $i++){
			if($data_band[$i] > $data_band[$i+1]){
				$jml += $data_band[$i] - $data_band[$i+1];
			}else {
				$jml += $data_band[$i+1] - $data_band[$i];
			}
		}

		$jarak = round((($jml/(count($data_band)-1))/2),-2);
		$jarak = $jarak/2;
		$jarak = round ($jarak, -2);

		$this->db->select_max('jumlah');
		$query1 = $this->db->get_where('bandwidth', $where)->result_array();
		$max = $query1[0]['jumlah'];

		$this->db->select_min('jumlah');
		$query2 = $this->db->get_where('bandwidth', $where)->result_array();
		$min = $query2[0]['jumlah'];

		$max = (round($max, -2)+100);										
		$temp_min = $max;
		$temp_max = 0;
		$i=0;
		while($temp_min > $min){
			$temp_max = $temp_min;
			$temp_min = $temp_min-$jarak;
			$temp_interval[$i][0] = $temp_min;
			$temp_interval[$i][1] = $temp_max;
			$i++;
		}
		$interval = count($temp_interval);
		
		return $this->session->set_flashdata('message', $interval);
		
	}
}