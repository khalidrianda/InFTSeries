<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
	}
	public function index(){
		$data['title']='My Profile';
		$data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);

	}

	public function tambah_aksi(){
		$id = $this->input->post('id');
		$images = $this->input->post('images');
		$name = $this->input->post('name');
		$image = $_FILES['image'];

		if ($image=''){}else{
			$config['upload_path'] = './assets/img/profile';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				$data = array(
					'name' => $name,
					'image' => $images,
				);
			}else{
				$image=$this->upload->data('file_name');
				$data = array(
					'name' => $name,
					'image' => $image,
				);
			}
		}

		
		$where = array('id' => $id);
		$this->m_user->update_data($where, $data, 'user');
		redirect('user/index');
	}

	public function ganti_password(){
		$this->form_validation->set_rules('passwordlama1','Passwordlama1', 'required|trim');
		$this->form_validation->set_rules('password1','Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password', 'required|trim|min_length[6]|matches[password1]');
		
		$id = $this->input->post('id');
		$passwordlama = $this->input->post('passwordlama');
		$passwordlama1 = $this->input->post('passwordlama1');
		
			if(!password_verify($passwordlama1, $passwordlama)){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">The old password are wrong</div>');
					redirect('user');
			}else if($this->form_validation->run()==false){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong repeat password</div>');
				redirect('user');
			}else{
				$data = array(
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
				);
				$where = array('id' => $id);
				$this->m_user->update_data($where, $data, 'user');
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has changed</div>');
				redirect('user/index');
			}
		
	}
}