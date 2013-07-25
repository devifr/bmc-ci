<?php

class Dosen_model extends CI_Model{

	public function get_all(){
		return $this->db->get('tbl_dosen');
		//mysql_query("SELECT * from mahasiswa");
	}

	public function get_by_id($id){
		$this->db->where('id_dosen',$id);
		return $this->db->get('tbl_dosen');
		//mysql_query("SELECT * from mahasiswa where id_mahasiswa'$id");
	}

	public function insert_data($data){
		return $this->db->insert('tbl_dosen',$data);
	}
	public function change_data($id,$data){
		$this->db->where('id_dosen',$id);
		return $this->db->update('tbl_dosen',$data);
	}
	public function delete_data($id){
		$this->db->where('id_dosen',$id);
		return $this->db->delete('tbl_dosen');
	}
}