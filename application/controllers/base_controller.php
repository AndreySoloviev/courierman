<?php

class Base_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loggedin'))
        {
            header('Location: /sessions/login');
        }
    }
}

?>