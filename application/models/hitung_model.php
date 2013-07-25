<?php

class Hitung_model extends CI_Model{

	public function insert_data($data){
		return $this->db->insert('hitung',$data);
	}
	
}