<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['id'] = $this->input->post('id');
		$data['talpa']= $this->input->post('talpa');
		$data['omanual']= $this->input->post('kolominterval');
		$data['o_auto']= $this->input->post('kolomauto');
		$data['prediksi']= $this->input->post('prediksi');
		$peramalan= $this->input->post('peramalan');
		$tipee= $this->input->post('tipe');
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->m_projek->update_peramalan($this->input->post('id'), $peramalan, $tipee);
 		
 		if($this->input->post('tipe') == "Fuzzy Time Series"){
 			if($this->input->post('ket') == "Data Bulanan"){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('../../assets/pages/proses_perhitungan', $data);
			$this->load->view('templates/footer', $data);
			}else if($this->input->post('ket') == "Data Harian"){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('../../assets/pages/proses_perhitungan1', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('../../assets/pages/proses_perhitungan2', $data);
				$this->load->view('templates/footer', $data);
			}
 		}else{
	 		if($this->input->post('ket') == "Data Bulanan"){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('../../assets/pages/bulan_cheng', $data);
				$this->load->view('templates/footer', $data);
			}else if($this->input->post('ket') == "Data Harian"){
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('../../assets/pages/hari_cheng', $data);
				$this->load->view('templates/footer', $data);
			}else{
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('../../assets/pages/tahun_cheng', $data);
				$this->load->view('templates/footer', $data);
			}
 		}
		
	}

	public function proses(){
		$data['title']='Proses Peramalan';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$data['projek'] = $this->m_projek->tampil_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data/proses_hasil', $data);
		$this->load->view('templates/footer', $data);
	}

	public function hasil(){
		$data['title']='Hasil Peramalan';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$data['projek'] = $this->m_projek->tampil_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data/hasil_projek', $data);
		$this->load->view('templates/footer', $data);
	}

	public function grafik(){
		$data['title']='Grafik Peramalan';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$data['projek'] = $this->m_projek->tampil_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('data/grafik_projek', $data);
		$this->load->view('templates/footer', $data);
	}

	public function detail($id, $title, $tipe){
		// $data['id_proj']= $id;


		if($this->session->userdata('id') <0){
			$dat = ['id' => $id];
			$this->session->set_userdata($dat);
			$data['id'] = $this->session->userdata('id');
			$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['keterangan'] = $this->db->get_where('projek', ['id' => $this->session->userdata('id')])->row_array();

			$this->load->model('m_projek');
			$detail = $this->m_data->detail_hasil($id)->result();
			$data['detail'] = $detail;
			if($title=="Hasil%20Peramalan"){
				$data['title']="Hasil Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/hasil', $data);
				$this->load->view('templates/footer', $data);
			}else if($title=="Grafik%20Peramalan"){
				$data['title']="Grafik Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/grafik', $data);
				$this->load->view('templates/footer', $data);
			}else if($title=="Proses%20Peramalan"){
				if($tipe=="Fuzzy%20Time%20Series"){
					$nilai = $this->m_data->detail_interval($id)->result();
					$data['nilai']=$nilai;
					$data['tipe']="FTS";	
				}else{
					$nilai = $this->m_data->detail_cheng($id)->result();
					$data['nilai']=$nilai;
					$data['tipe']="FTSCHENG";	
				}
				
				$data['title']="Proses Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/proses', $data);
				$this->load->view('templates/footer', $data);
			}
			
			
		}else{
			$this->session->unset_userdata('id');
			$dat = ['id' => $id];
			$this->session->set_userdata($dat);
			$data['id']=$this->session->userdata('id');
			$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['keterangan'] = $this->db->get_where('projek', ['id' => $this->session->userdata('id')])->row_array();
			$this->load->model('m_projek');
			$detail = $this->m_data->detail_hasil($id)->result();
			$data['detail'] = $detail;

			if($title=="Hasil%20Peramalan"){
				$data['title']="Hasil Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/hasil', $data);
				$this->load->view('templates/footer', $data);	
			}else if($title=="Grafik%20Peramalan"){
				$data['title']="Grafik Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/grafik', $data);
				$this->load->view('templates/footer', $data);
			}else if($title=="Proses%20Peramalan"){
				if($tipe=="Fuzzy%20Time%20Series"){
					$nilai = $this->m_data->detail_interval($id)->result();
					$data['nilai']=$nilai;
					$data['tipe']="FTS";	
				}else{
					$nilai = $this->m_data->detail_cheng($id)->result();
					$data['nilai']=$nilai;	
					$data['tipe']="FTSCHENG";
				}
				$data['detai'] = $this->m_data->detail_hasila($id)->result_array();
				$data['title']="Proses Peramalan";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('data/proses', $data);
				$this->load->view('templates/footer', $data);
			}

			
		}
	}

	public function export($id){
		$where = array('id_projek' => $id);
		$data['data'] = $this->db->get_where('hasil_akhir', $where)->result();
		$this->load->view('fts/cetak', $data); 
	}

	public function prints($id){
		$where = array('id_projek' => $id);
		$data['data'] = $this->db->get_where('hasil_akhir', $where)->result();
		$this->load->view('fts/print', $data);
	}

	public function printgrap($id){
		$where = array('id_projek' => $id);
		$data['data'] = $this->db->get_where('hasil_akhir', $where)->result();
		$this->load->view('fts/printgrap', $data);
	}

	public function savepng($id){
		$where = array('id_projek' => $id);
		$data['data'] = $this->db->get_where('hasil_akhir', $where)->result();
		$this->load->view('fts/savepng', $data);
	}

	public function tempfile(){
		$this->load->view('fts/tempfile');
	}
}