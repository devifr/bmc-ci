<?php

 function sukses($message = '')
 {
 	$CI =& get_instance();
 	return $CI->session->set_flashdata('msg', $message);
 }

 function gagal($message = '')
 {
 	$CI =& get_instance();
 	return $CI->session->set_flashdata('msg', $message);
 } 