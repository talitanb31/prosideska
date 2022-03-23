<?php
class Blokir extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        is_login();
    }
    
    function index(){
        $this->load->view('auth/blokir_akses');
    }
}