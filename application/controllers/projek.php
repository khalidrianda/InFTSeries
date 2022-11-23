<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projek extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}

	public function index(){
		$data['title']='Projek';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$data['projek'] = $this->m_projek->tampil_data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('projek/index', $data);
		$this->load->view('templates/footer', $data);

	}


	public function tambah_aksi(){
		$title_projek = $this->input->post('title_projek');
		$email= $this->session->userdata('email');
		$tipe = $this->input->post('tipe');
		$ket = $this->input->post('ket');
		$peramalan = $this->input->post('peramalan');
		$data_aktual = $this->input->post('data_aktual');

		$data = array(
			'title_projek' => $title_projek,
			'email' => $email,
			'tipe' => $tipe,
			'ket' => $ket,
			'peramalan' => $peramalan,
			'data_aktual' => $data_aktual,
		);

		$this->m_projek->input_data($data, 'projek');
		redirect('projek/index');
	}

	public function hapus($id){
		$where = array('id' => $id);
		$this->m_projek->hapus_data($where, 'projek');
		$wher = array('id_projek' => $id);
		$this->m_projek->hapus_alldata($wher, 'bandwidth');
		$this->m_projek->hapus_alldata($wher, 'hasil_akhir');
		redirect('projek/index');
	}

	public function edit($id){
		$where = array('id' => $id);
		$data['projek'] = $this->m_projek->edit_data($where, 'projek')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('edit', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update(){
		$id = $this->input->post('id');
		$title_projek = $this->input->post('title_projek');
		$email = $this->session->userdata('email');
		$tipe = $this->input->post('tipe');
		$ket = $this->input->post('ket');
		$peramalan = $this->input->post('peramalan');
		$data_aktual = $this->input->post('aktual');

		$data = array(
			'title_projek' => $title_projek,
			'email' => $email,
			'tipe' => $tipe,
			'ket' => $ket,
			'peramalan' => $peramalan,
			'data_aktual' => $aktual,
		);

		$where = array('id' => $id);
		$this->m_projek->update_data($where, $data, 'projek');
		redirect('projek/index');
	}

	public function search(){
		$data['title']='Projek';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->post('keyword');
		$email = array('email' => $this->session->userdata('email'));
		$data['projek'] = $this->m_projek->get_keyword($keyword, $email);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('projek/index', $data);
		$this->load->view('templates/footer', $data);
	}
}