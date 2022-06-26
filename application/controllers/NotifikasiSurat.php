<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotifikasiSurat extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('PermintaanSurat_model');
        $this->load->library('datatables');
        $this->data['page_title']  = 'Notifikasi';
    }

    public function index()
    {
        $this->data['data'] = $this->PermintaanSurat_model->getSuratByStatus('pending');
        $this->template->load('template', 'notifikasi/index', $this->data);
    }
}
