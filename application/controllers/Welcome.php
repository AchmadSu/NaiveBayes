<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->session->userdata('is_login')){
			redirect('Login');
        }
		$data['session_id'] = $this->session->userdata('session_id');
		$data['nip'] = $this->session->userdata('nip');
		$data['username'] = $this->session->userdata('username');
		$this->load->view("templates/header", $data);
		$this->load->view("templates/sidebar");
		$this->load->view("index.php");
		$this->load->view("templates/footer");
	}
}
