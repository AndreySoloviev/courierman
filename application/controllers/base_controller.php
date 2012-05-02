<?php

class Base_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Europe/Moscow");
        
        if (!$this->session->userdata('loggedin'))
        {
            header('Location: /sessions/login');
        }
    }
}

?>