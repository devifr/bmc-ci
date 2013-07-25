<?php

class Bmc_model extends CI_Model{

	public function get_all(){

		return $this->db->get('mahasiswa');
		//mysql_query("SELECT * from mahasiswa");
	}

	public function get_all_by_limit($limit,$start){
		$this->db->join('tbl_dosen','tbl_dosen.id_dosen=mahasiswa.dpa_id','left');
		return $this->db->get('mahasiswa',$limit,$start);
		//mysql_query("SELECT * from mahasiswa limit $limit, $start");
	}

	public function get_by_id($id){
		
		$this->db->where('id_mahasiswa',$id);
		return $this->db->get('mahasiswa');
		//mysql_query("SELECT * from mahasiswa where id_mahasiswa='$id'");
	}

	public function cek_login($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('mahasiswa');
		//select * from mahasiswa where emai='$email' and password='$password' 
	}

	public function insert_data($data){
		return $this->db->insert('mahasiswa',$data);
	}

	public function change_data($id,$data){
		$this->db->where('id_mahasiswa',$id);
		return $this->db->update('mahasiswa',$data);
	}
	
	public function delete_data($id){
		$this->db->where('id_mahasiswa',$id);
		return $this->db->delete('mahasiswa');
	}
}