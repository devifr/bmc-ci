<?php
class Mahasiswa extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bmc_model','bmc');
		$this->load->library('form_validation');
		$this->load->helper('alert');
		$this->load->library('auth');
		$this->output->enable_profiler(TRUE);
			
	}

	public function index(){
		$this->auth->cek_sudah_login();
		$data_header['title'] = "Halaman Login Mahasiswa";
		$data_footer['footer'] = "Copyright Kursus CI | 2013";
		$this->load->view('header',$data_header);
		$this->load->view('mahasiswa/form_login');
		$this->load->view('footer',$data_footer);
	}

	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == false){
			gagal("");
			redirect('mahasiswa');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->auth->login($email,$password);
			// $cek_login = $this->bmc->cek_login($email,$password);
			// if($cek_login->num_rows()>0){
			// 	$data_login = array('email'=>$email,'password'=>$password);
			// 	$this->session->set_userdata($data_login);
			// 	sukses('Anda Berhasil Login');
			// 	redirect('home/view_all');
			// }else{
			// 	gagal('Email Atau Password Salah, Silahkan Ulangi');
			// 	redirect('mahasiswa');
			// }
		}
	}

	public function logout(){
		$this->auth->logout();
	}
}