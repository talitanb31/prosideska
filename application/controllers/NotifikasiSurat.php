<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotifikasiSurat extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('NotifikasiPermintaan_model');
        $this->load->library('datatables');
        $this->data['page_title']  = 'Notifikasi';
    }

    public function index()
    {
        $idUser = $_SESSION['id'];
        $this->data['data'] = $this->NotifikasiPermintaan_model->getSuratByStatus('pending', $idUser);
        $this->template->load('template', 'notifikasi/index', $this->data);
    }
}
