<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
	}

	public function index()
	{
        if($this->session->userdata('is_login')){
			redirect('DataTraining');
        } else {
            $this->load->view('view_login');
        }
	}

    public function register()
	{
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        redirect('register');
	}

	public function proses()
	{
        if($this->session->userdata('is_login')){
			redirect('DataTraining');
        } else {
            $nip = $this->input->post('nip');
            $password = md5($this->input->post('password'));
            if($this->auth->login_user($nip,$password))
            {
                redirect('DataTraining');
            }
            else
            {
                if(isset($_SESSION['success_register'])){
                    unset($_SESSION['success_register']);
                }
                $this->session->set_flashdata('error','NIP dan/atau Password salah');
                redirect('login');
            }
        }
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('is_login');
        $this->session->sess_destroy();
		redirect('login');
	}

	

}