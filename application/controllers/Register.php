<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('auth');
	}

	public function index()
	{
        // var_dump($_SESSION['error']);exit();
		$this->load->view('view_register');
	}

	public function proses()
	{
		$this->form_validation->set_rules('nip', 'nip','trim|required|min_length[1]|max_length[255]|is_unique[tb_user.nip]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nip = $this->input->post('nip');
			$this->auth->register($username,$password,$nip);
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('login');
		}
		else
		{
			$this->session->set_flashdata('error', 'NIP sudah terdaftar, gunakan yang lain!');
			redirect('register');
		}
	}
}