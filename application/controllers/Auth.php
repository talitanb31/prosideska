<?php
Class Auth extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        if(!$ci->session->userdata('id')){
            redirect('auth');
        }else{
            $modul = $ci->uri->segment(1);
        redirect('welcome/index');
        }
    }

    function index(){
        $this->load->view('auth/login');
    }
    
    function cheklogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('username',$username);
        //$this->db->where('password',  $test);
        $users = $this->db->get('akun');
        if($users->num_rows()>0){
            $user = $users->row_array();
            echo($user['password']);
            if(password_verify($password,$user['password'])){
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('welcome');
            }else{
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','username atau password yang anda input salah');
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
