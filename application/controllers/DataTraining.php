<?php 

/**
 * 
 */
class DataTraining extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Training_Model');
		$this->load->library('form_validation');
	}

	protected function getQueryStringParams() {
		parse_str($_SERVER['REQUEST_URI'], $params);
		return $params;
	}
	
	function index()
	{
// 		$url = parse_url($_SERVER['REQUEST_URI']);
// parse_str($url['query'], $params); 
		$params = $this->getQueryStringParams();
		$skip = !empty($params['/NBV1/DataTraining?skip']) ? $params['/NBV1/DataTraining?skip'] : null;
		$take = 50;

		$data['training'] = $this->Training_Model->getAllDataLimit($skip, $take);
		$skip = !empty($params['/NBV1/DataTraining?skip']) ? $params['/NBV1/DataTraining?skip'] : '0';
		$data['skip'] = (int)$skip;
		$data['countAll'] = $this->Training_Model->count_allData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('training/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form(){
		// $this->form_validation->set_rules("id_training", "Id Training", "required|is_unique[tbl_training.id_training]|max_length[5]");
		$this->form_validation->set_rules("nama", "Nama ", "required");
		$this->form_validation->set_rules("pkh", "Pkh ", "required");
		$this->form_validation->set_rules("jml_tanggungan", "Jumlah Tanggungan ", "required");
		$this->form_validation->set_rules("kepala_rt", "Kepala Rumah Tangga", "required");
		$this->form_validation->set_rules("rw", "RW", "required");
		$this->form_validation->set_rules("jml_penghasilan", "Jumlah Penghasilan", "required");
		// $this->form_validation->set_rules("status_rumah", "Status Rumah", "required");
		// $this->form_validation->set_rules("status_kelayakan", "Status Kelayakan", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->Training_Model->tambah_data();
			$this->session->set_flashdata('flash_training', 'Disimpan');
			redirect('DataTraining');
		}	
	}

	public function hapus($id)
	{
		$this->Training_Model->hapus_data($id);
		$this->session->set_flashdata('flash_training', 'Dihapus');
		redirect('DataTraining');
	}

	public function ubah($id)
	{
		// $this->form_validation->set_rules("id_training", "Id Training", "required|max_length[5]");
		$this->form_validation->set_rules("nama", "Nama", "required");
		$this->form_validation->set_rules("pkh", "Pkh", "required");
		$this->form_validation->set_rules("jml_tanggungan", "Jumlah Tanggungan", "required");
		$this->form_validation->set_rules("kepala_rt", "Kepala Rumah Tangga", "required");
		$this->form_validation->set_rules("rw", "RW", "required");
		$this->form_validation->set_rules("jml_penghasilan", "Jumlah Penghasilan", "required");
		// $this->form_validation->set_rules("status_rumah", "Status Rumah", "required");
		// $this->form_validation->set_rules("status_kelayakan", "Status Kelayakan", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$data['ubah']= $this->Training_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('training/ubah', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Training_Model->ubah_data();
			$this->session->set_flashdata('flash_training', 'DiUbah');
			redirect('DataTraining');
		}	
	}


}
?>