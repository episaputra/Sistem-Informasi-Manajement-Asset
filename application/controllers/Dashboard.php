<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['statusLlogin'])) {
            redirect(base_url());
        }        
    }

        public function index()
    {
        $this->template->load('template','dashboard');
    }
}
