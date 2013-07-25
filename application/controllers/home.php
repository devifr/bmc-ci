<?php
//nama class harus sama dengan nama file, dan nama class Dimulai huruf besar
	class Home extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('bmc_model','bmc');
			$this->load->helper('alert');
			// $this->output->enable_profiler(TRUE);
		}

		//method
		public function index($parameter1=1){
			$this->load->library('pengulangan');
			$data['isi'] = $this->pengulangan->mundur($parameter1);
			$this->load->view('index',$data);
		}

		public function pertambahan($parameter1=0,$parameter2=0){
			$hasilPertambahan = $parameter1 + $parameter2;
			$data['isi'] = $hasilPertambahan;
			$this->load->view('index',$data);		
		}

		public function pengurangan($parameter1=0,$parameter2=0){
			$hasilPertambahan = $parameter1 - $parameter2;
			$data['isi'] = $hasilPertambahan;
			$this->load->view('index',$data);		
		}

		//untuk memanggil halaman form input
		public function form_input(){
			$data_header['title'] = "Halaman Input Mahasiswa";
			$data_footer['footer'] = "Copyright Kursus CI | 2013";
			$this->load->model('dosen_model','dosen');
			$data['data_dosen'] = $this->dosen->get_all();
			$this->load->view('header',$data_header);
			$this->load->view('form_input',$data);
			$this->load->view('footer',$data_footer);
		}


		public function save_data(){

			$nim = $this->input->post('nim'); // $_POST['nim'];
			$nama = $this->input->post('nama'); // $_POST['nama'];
			$semester = $this->input->post('semester'); // $_POST['semester'];
			$phone = $this->input->post('phone'); // $_POST['phone'];
			$email = $this->input->post('email'); // $_POST['email'];
			$password = $this->input->post('password'); // $_POST['password'];
			$dpa = $this->input->post('dpa'); // $_POST['password'];

			$isi_data = array('nim'=>$nim,'nama'=>$nama,'semester'=>$semester,
				'phone'=>$phone,'email'=>$email,'password'=>$password,
				'dpa_id'=>$dpa); 
			//array ini digunakan untuk menyimpan
			//kedalam database, key dari array ini adalah nama field table, dan value
			//adalah data yang akan dimasukkan kedalam key/field teble
			$simpan = $this->bmc->insert_data($isi_data); //ini adalah dari model
			if($simpan){
				sukses('msg','Data Berhasil Disimpan');
				// $this->session->set_flashdata('msg','Data Berhasil Disimpan');
				redirect('home/view_all');
			}
			else{
				$this->session->set_flashdata('msg','Data Gagal Disimpan');
				redirect('home/view_all');				
			}
		}

		// public function form_input_hitung($parameter1="pertambahan"){
		// 	$this->load->view('form_hitung');
		// }

		// public function save_data_hitung($parameter1){

		// 	$this->load->model('hitung_model','hitung');
			
		// 	$vala = $this->input->post('valA'); 
		// 	$valb = $this->input->post('valB'); 
		// 	if($parameter1=="pertambahan"){
		// 		$hasil = $vala + $valb;
		// 	}else if($parameter1=="perkalian"){
		// 		$hasil = $vala * $valb;
		// 	}
			
		// 	$isi_data = array('vala'=>$vala,'valb'=>$valb,'hasil'=>$hasil); 
		// 	$simpan = $this->hitung->insert_data($isi_data); //ini adalah dari model
		// 	if($simpan){
		// 		echo "Data Berhasil Disimpan";
		// 	}
		// 	else{
		// 		echo "Data Gagal DIsimpan";
		// 	}
		// }

		public function view_all(){
			// $this->load->library('auth');
			// $this->auth->cek_belum_login();
			$this->load->model('bmc_model','bmc');

			$jumlah = $this->bmc->get_all()->num_rows();

			$this->load->library('pagination');

			$config['base_url'] = base_url()."index.php/home/view_all/";
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 1;
			$config['uri_segment'] = 3;
			$config['num_links'] = 1;
			
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();
			if($this->uri->segment('3')) $start = $this->uri->segment('3');
			else $start = 0;
			
			$data['data_mahasiswa'] = $this->bmc->get_all_by_limit($config['per_page'],$start);

			$this->load->view('view_all',$data);
		}

		public function edit_data($id){
			$this->load->library('auth');
			$this->auth->cek_belum_login();
			$data['rows'] = $this->bmc->get_by_id($id);
			//untuk manggil data yang sudah diinput
			$this->load->view('form_edit',$data);
		}

		public function update_data($id){
			$this->load->library('form_validation');
			$this->load->model('bmc_model','bmc');
			$this->form_validation->set_rules('nim','NIM','required');
			$this->form_validation->set_rules('nama','Nama Mahasiswa','required');
			$this->form_validation->set_rules('email','email','required|valid_email');
			if($this->form_validation->run() == false){
				$this->session->set_flashdata('msg',validation_errors());
				redirect('home/edit_data/'.$id);
			}else{
				$nim = $this->input->post('nim');
				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$semester = $this->input->post('semester');
				$phone = $this->input->post('phone');

				$data = array('nim'=>$nim,'nama'=>$nama,'email'=>$email,
					'semester'=>$semester,'phone'=>$phone);
				$update = $this->bmc->change_data($id,$data);
				if($update){
					$this->session->set_flashdata('msg','Data Berhasil Diubah');
					redirect('home/view_all');
				}else{
					$this->session->set_flashdata('msg','Data Berhasil Diubah');
					redirect('home/edit_data/'.$id);

				}
			}
		}

		public function hapus_data($id){
			$this->load->model('bmc_model','bmc');
			$hapus = $this->bmc->delete_data($id);
			if($hapus){
				$this->session->set_flashdata('msg','Data Berhasil Hapus');
				redirect('home/view_all');
			}else{
				$this->session->set_flashdata('msg','Data Gagal dihapus');
				redirect('home/view_all');
			}
		}

		public function show_chart()
		{
			$this->load->model('dosen_model','dosen');
			$this->load->model('bmc_model','bmc');
			$data['jml_dosen'] = $this->dosen->get_all()->num_rows();
			$data['jml_mahasiswa'] = $this->bmc->get_all()->num_rows();
			$this->load->view('home/show_chart',$data);
		}
	}

	