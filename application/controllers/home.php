<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//is_logged_in();
	}

	public function index(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/homepage');
		$this->load->view('templates/home_footer');
	}

	public function guide(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/guide', $data);
		$this->load->view('templates/home_footer');
	}

	public function tutorial(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/tutorial', $data);
		$this->load->view('templates/home_footer');
	}

	public function research(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/research');
		$this->load->view('templates/home_footer');
	}

	public function community(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/community');
		$this->load->view('templates/home_footer');
	}

	public function develop(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/develop');
		$this->load->view('templates/home_footer');
	}

	public function kontak(){
		if($this->session->userdata('email')){
			$data['login']= "ada";
		}else{
			$data['login']= "tidak ada";
		}
		$this->load->view('templates/home_header', $data);
		$this->load->view('homepage/kontak');
		$this->load->view('templates/home_footer');
	}
}