<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model 
{

	public function __construct()
	{
        parent::__construct();
	}

	function register($username,$password,$nip)
	{
        $data_user = array(
            'username'=>$username,
            'password'=>md5($password),
            'nip'=>$nip
        );
        $this->db->insert('tb_user',$data_user);
	}

	function login_user($nip,$password)
	{
        $query = $this->db->get_where('tb_user',array('nip'=>$nip));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            // var_dump($password);exit();
            if ($password === $data_user->password) {
                $this->session->set_userdata('session_id', $data_user->id);
                $this->session->set_userdata('nip',$nip);
				$this->session->set_userdata('username',$data_user->username);
				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('login');
		}
    }
}
?>