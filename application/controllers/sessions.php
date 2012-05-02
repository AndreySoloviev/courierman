<?php

class Sessions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function authenticate()
    {        
        $this->load->model('user_model', '', true);
        
        $data = $this->user_model->authenticate($this->input->post('email'), $this->input->post('password'));
        if ($data)
        {
            if($data["flags"] & U_BANNED)
            {
            	header('Location: /login/');
            }
            else
            {	                        
	            $this->session->set_userdata('loggedin', true);
	            $this->session->set_userdata('id', $data["id"]);
	            $this->session->set_userdata('name', $data["name"]);
				$this->session->set_userdata('surname', $data["surname"]);
				$this->session->set_userdata('email', $data["email"]);
				$this->session->set_userdata('flags', $data["flags"]);
				
            }
            header('Location: /courier/documents/this_week/');
        }
        else
        {
            header('Location: /sessions/login');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('loggedin');
        header('Location: /login/');
    }
}

?>