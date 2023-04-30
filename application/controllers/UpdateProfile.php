<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateProfile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('auth');
	}

	public function index()
	{
        if(!$this->session->userdata('is_login')){
			redirect('Login');
        }
		if(isset($_SESSION['error'])){
			unset($_SESSION['error']);
		}
		$data['session_id'] = $this->session->userdata('session_id');
		$data['nip'] = $this->session->userdata('nip');
		$data['username'] = $this->session->userdata('username');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('view_updateProfile', $data);
		$this->load->view('templates/footer');
	}

	public function clean() {
		if(isset($_SESSION['errorUpdate'])){
			unset($_SESSION['errorUpdate']);
		}
		redirect('updateProfile');
	}

	public function proses()
	{
        if(!$this->session->userdata('is_login')){
			redirect('Login');
        }
		$this->form_validation->set_rules('nip', 'nip','trim|min_length[1]|max_length[255]|is_unique[tb_user.nip]');
		$this->form_validation->set_rules('old_password', 'old_password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('new_password', 'new_password','trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('confirm_password', 'confirm_password','trim|matches[new_password]');
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$id = $this->session->userdata('session_id');
			$oldPassword = md5($this->input->post('old_password'));
			$checkOldPassword = $this->auth->checkOldPassword($id, $oldPassword);
			if($checkOldPassword) {
				$username = $this->input->post('username');
				$password = $this->input->post('new_password');
				$nip = $this->input->post('nip');
				$this->auth->updateProfile($id,$username,$password,$nip);
				if(isset($_SESSION['error'])){
					unset($_SESSION['error']);
				}
				$this->session->set_flashdata('flash_training','Update Profile berhasil!');
				redirect('DataTraining');
			} else {
				$this->session->set_flashdata('errorUpdate', 'Password lama anda tidak sesuai!');
				redirect('updateProfile');
			}
		}
		else
		{
			$this->session->set_flashdata('errorUpdate', validation_errors());
			redirect('updateProfile');
		}
	}
}