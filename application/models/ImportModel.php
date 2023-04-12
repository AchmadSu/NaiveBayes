<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportModel extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('tbl_training', $data);
		if($insert){
			return true;
		}
	}

}