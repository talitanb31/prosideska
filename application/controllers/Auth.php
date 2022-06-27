<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $ci = get_instance();
        // if(!$ci->session->userdata('id')){
        //     redirect('auth');
        // }else{
        //     $modul = $ci->uri->segment(1);
        // redirect('welcome/index');
        // }
    }

    function index()
    {
        $this->load->view('auth/login');
    }

    function cheklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('username', $username);
        //$this->db->where('password',  $test);
        $users = $this->db->get('akun');
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            echo ($user['password']);
            if (password_verify($password, $user['password'])) {
                // retrive user data to session
                // $this->session->set_userdata($user);
                $_SESSION['id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                $_SESSION['created_at'] = $user['created_at'];
                $_SESSION['updated_at'] = $user['updated_at'];
                redirect('welcome');
            } else {
                $this->session->set_flashdata('status_login', 'Password yang anda input salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('status_login', 'Akun tidak ditemukan');
            redirect('auth');
        }
    }

    function logout()
    {
        // $this->session->sess_destroy();
        $_SESSION['id'] = '';
        $_SESSION['nama'] = '';
        $_SESSION['username'] = '';
        $_SESSION['level'] = '';
        $_SESSION['created_at'] = '';
        $_SESSION['updated_at'] = '';
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
