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
        if($this->session->userdata('is_login')){
			redirect('DataTraining');
        }
		$this->load->view('view_register');
	}

	public function login()
	{
        if($this->session->userdata('is_login')){
			redirect('DataTraining');
        }
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        redirect('login');
	}

	public function proses()
	{
        if($this->session->userdata('is_login')){
			redirect('DataTraining');
        }
		$this->form_validation->set_rules('nip', 'nip','trim|required|min_length[1]|max_length[255]|is_unique[tb_user.nip]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('confirm_password', 'confirm_password','trim|required|required|matches[password]');
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
			$this->session->set_flashdata('error', validation_errors());
			redirect('register');
		}
	}
}