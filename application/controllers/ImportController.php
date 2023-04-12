<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

	public function index(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$rw = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kepala_rt = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$pendidikan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$pekerjaan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$penghasilan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$jml_tunjangan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $gender = '';
                    if ($kepala_rt == 1) { 
                        $gender = 'Laki-laki'; 
                    } else { 
                        $gender = 'Perempuan'; 
                    }
					$temp_data[] = array(
						'nama'	=> $nama,
						'rw'	=> $rw,
						'kepala_rt' => $gender,
						'pkh' => 0,
						'jml_tanggungan' => $jml_tunjangan,
						'pendidikan' => $pendidikan,
						'pekerjaan' => $pekerjaan,
						'penghasilan' => $penghasilan,
					); 	
				}
			}
			$this->load->model('ImportModel');
			$insert = $this->ImportModel->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

}