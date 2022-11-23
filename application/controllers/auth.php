<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index(){

		if(!$this->session->userdata('email')){
			$data['login']= "tidak ada";
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('password','Password','trim|required');

			if($this->form_validation->run()==false){
				$data['title']='FTS Login';
				$this->load->view('templates/home_header', $data);
				$this->load->view('auth/login');
				$this->load->view('templates/auth_footer');
			}else{
				$this->_login();
			}
		}else{
			redirect('projek');
		}
	}


	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();
		$user = $this->db->get_where('user',['email' => $email])->row_array();


		//jika user ada
		if($user){
			//jika user aktif
			if($user['is_active']==1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('admin');
					}
					else{
						redirect('projek');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pasword salah</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum di aktivasi</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email Belum Terdaftar</div>');
			redirect('auth');
			
		}
	}


	public function registration(){
		$this->form_validation->set_rules('name','Name', 'required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1','Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password', 'required|trim|min_length[6]|matches[password1]');
		$data['login']= "tidak ada";

		if($this->form_validation->run()==false){
			$data['title']='FTS Registration';
			$this->load->view('templates/home_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		}else{
			$data=[
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'image' => 'delfault.png',
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
				];	

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mendaftar, silahkan login</div>');
				redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah logout</div>');
		redirect('auth');
	}

	public function blocked(){
		
		$this->load->view('auth/blocked');
		
	}

}