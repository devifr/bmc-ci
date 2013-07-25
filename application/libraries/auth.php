<?php

	class Auth{

		public function login($email,$password){
			$CI =& get_instance();
			$CI->load->model('bmc_model','bmc');
			$CI->load->helper('alert');
			$cek_login = $CI->bmc->cek_login($email,$password);
			if($cek_login->num_rows()>0){
				$data_login = array('email'=>$email,'password'=>$password);
				$CI->session->set_userdata($data_login);
				sukses('Anda Berhasil Login');
				redirect('home/view_all');
			}else{
				gagal('Email Atau Password Salah, Silahkan Ulangi');
				redirect('mahasiswa');
			}
		}

		public function logout(){
			$CI =& get_instance();
			$CI->session->sess_destroy();
			redirect('mahasiswa');
		}

		public function cek_belum_login(){
			$CI =& get_instance();
			if($CI->session->userdata('email')==''){
				redirect('mahasiswa');
			}
		}

		public function cek_sudah_login(){
			$CI =& get_instance();
			if($CI->session->userdata('email')!=''){
				redirect('home/view_all');
			}
		}
	}