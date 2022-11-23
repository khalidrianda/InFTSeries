<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function tambah_aksi(){
		$id_projek = $this->session->userdata('id');
		$tanggal= $this->input->post('tanggal');
		$bulan= $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$jumlah = $this->input->post('jumlah');
		$this->m_projek->ada_data($id_projek, $this->input->post('data_aktual'));

		$data = array(
			'id_projek' => $id_projek,
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'jumlah' => $jumlah,
		);

		$this->m_data->input_data($data, 'bandwidth');
		redirect('data/detail/'.$id_projek.'/'.$this->input->post('title'));
	}

	public function detail($id, $title){
		// $data['id_proj']= $id;
		if($title=="Data%20Harian"){
			$data['title']= "Data Harian";
		}else if($title=="Data%20Bulanan"){
			$data['title']= "Data Bulanan";
		}else{
			$data['title']= "Data Tahunan";
		}

		if($this->session->userdata('id') <0){
			$dat = ['id' => $id];
			$this->session->set_userdata($dat);
			$data['id'] = $this->session->userdata('id');
			$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['keterangan'] = $this->db->get_where('projek', ['id' => $this->session->userdata('id')])->row_array();


			$this->load->model('m_projek');
			$detail = $this->m_data->detail_data($id)->result();
			$data['detail'] = $detail;


			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data/bulanan', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$this->session->unset_userdata('id');
			$dat = ['id' => $id];
			$this->session->set_userdata($dat);
			$data['id']=$this->session->userdata('id');
			$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['keterangan'] = $this->db->get_where('projek', ['id' => $this->session->userdata('id')])->row_array();
			$this->load->model('m_projek');
			$detail = $this->m_data->detail_data($id)->result();
			$data['detail'] = $detail;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('data/bulanan', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function hapus($id, $title){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where, 'bandwidth');
		$id_projek = $this->session->userdata('id');
		redirect('data/detail/'.$id_projek.'/'.$title);
	}


	public function update(){
		$id = $this->input->post('id');
		$id_projek = $this->input->post('id_projek');
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$jumlah = $this->input->post('jumlah');


		$data = array(
			'id_projek' => $id_projek,
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'jumlah' => $jumlah,
		);

		$where = array('id' => $id);
		$this->m_data->update_data($where, $data, 'bandwidth');
		$id_projek = $this->session->userdata('id');
		redirect('data/detail/'.$id_projek.'/'.$this->input->post('title'));
	}

}