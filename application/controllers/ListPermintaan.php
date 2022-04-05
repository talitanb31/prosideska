<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListPermintaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('Pdf');
        $this->load->model('PermintaanSurat_model');
        $this->load->model('CetakSurat_model');
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

    public function printPdf($id, $jenisSurat)
    {
        $jenisSurat = str_replace('-', ' ', $jenisSurat);
        
        if($jenisSurat == 'surat pindah')
            $this->CetakSurat_model->suratPindah($jenisSurat);
        elseif($jenisSurat == 'surat tidak mampu')
            $this->CetakSurat_model->suratTidakMampu($jenisSurat);
        
    }


}
