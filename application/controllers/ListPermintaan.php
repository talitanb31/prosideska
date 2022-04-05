<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListPermintaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('PermintaanSurat_model');
    }

    public function index() {
        $data['data'] = $this->PermintaanSurat_model->getAllData();

        $this->template->load('template', 'list_permintaan/index', $data);
    }

    public function terima($id, $nik)
    {
        if ($this->PermintaanSurat_model->terima($id, $nik)) {
            $this->session->set_flashdata('pesan','surat berhasil diterima');
            redirect('listpermintaan/index');
        }else{
            $this->template->load('template','listpermintaan/index');
        }

    }
}
