<?php
class Pengulangan {
	
	public function mundur($parameter1){
		$CI =& get_instance();

		if($parameter1<=0){
			$data = "Angka Harus Lebih Besar dari 0";
		}else{
			$isi = "";
			for($i=$parameter1; $i >= 1 ; $i--) { 
				$isi .= $i;
				}
			$data = $isi;
		}

		return $data;
	}

}
