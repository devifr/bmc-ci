<?php
//nama class harus sama dengan nama file, dan nama class Dimulai huruf besar
	class Dosen extends CI_Controller{

		//untuk memanggil halaman form input
		public function form_input(){
			$this->load->view('dosen/form_input');
		}

		public function save_data(){
			$this->load->model('dosen_model','dosen');
			
			$nama = $this->input->post('nama'); // $_POST['nama'];
			$alamat = $this->input->post('alamat'); // $_POST['nim'];
			$telepon = $this->input->post('telepon'); // $_POST['phone'];
			$email = $this->input->post('email'); // $_POST['email'];

			$isi_data = array('nama_dosen'=>$nama,'alamat_dosen'=>$alamat,'email_dosen'=>$email,'telp_dosen'=>$telepon);
				//array ini digunakan untuk menyimpan
			//kedalam database, key dari array ini adalah nama field table, dan value
			//adalah data yang akan dimasukkan kedalam key/field teble
			$simpan = $this->dosen->insert_data($isi_data); //ini adalah dari model
			if($simpan){
				$this->session->set_flashdata('msg','Data berhasil disimpan');
				redirect('Dosen/view_all');
			}
			else{
				$this->session->set_flashdata('msg','Data gagal disimpan');
				redirect('Dosen/view_all');
			}
		}

		

		public function view_all(){
			$this->load->model('dosen_model','dosen');
			$data['data_dosen'] = $this->dosen->get_all();
			$this->load->view('dosen/view_all',$data);


		}
		public function edit_data($id){
			$this->load->model('dosen_model','dosen');
			$data['rows'] = $this->dosen->get_by_id($id);
			/*untuk memanggil data yang sudah diinput*/
			$this->load->view('dosen/form_edit',$data);
		}

		public function update_data($id){
			$this->load->library('form_validation');
			$this->load->model('dosen_model','dosen');
			$this->form_validation->set_rules('nama','Nama Dosen','required');
			$this->form_validation->set_rules('alamat','Alamat Dosen','required');
			$this->form_validation->set_rules('email','email','required|valid_email');
			if($this->form_validation->run()==false){
				$this->session->set_flashdata('msg',validation_errors());
				redirect('dosen/edit_data/'.$id);
			}
			else{
				$nama = $this->input->post('nama'); // $_POST['nama'];
				$alamat = $this->input->post('alamat'); // $_POST['nim'];
				$telepon = $this->input->post('telepon'); // $_POST['phone'];
				$email = $this->input->post('email'); // $_POST['email'];

				$data = array('nama_dosen'=>$nama,'alamat_dosen'=>$alamat,'email_dosen'=>$email,'tlp_dosen'=>$telepon);
				$update = $this->dosen->change_data($id,$data);
				if ($update){
					$this->session->set_flashdata('msg','Data berhasil diubah');
					redirect('dosen/view_all');
				}else{
					$this->session->set_flashdata('msg','Data berhasil diubah');
					redirect('dosen/edit_data/'.$id);

				}
			}
		}

		public function hapus_data($id){
			$this->load->model('dosen_model','dosen');
			$hapus = $this->dosen->delete_data($id);
			if($hapus){
				$this->session->set_flashdata('msg','Data berhasil dihapus');
					redirect('Dosen/view_all');
			}else{
				$this->session->set_flashdata('msg','Data berhasil diubah');
					redirect('Dosen/view_all');
			}
		}
	}


	