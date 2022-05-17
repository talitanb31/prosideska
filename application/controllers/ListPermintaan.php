<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ListPermintaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('Pdf');
        $this->load->model('PermintaanSurat_model');
        $this->load->model('CetakSurat_model');
        $this->load->model('Penduduk_model');
    }

    public function index()
    {
        $data['data'] = $this->PermintaanSurat_model->getAllData();

        $this->template->load('template', 'list_permintaan/index', $data);
    }

    public function terima($id, $nik)
    {
        if ($this->PermintaanSurat_model->terima($id, $nik)) {
            $this->session->set_flashdata('pesan', 'surat berhasil diterima');
            redirect('listpermintaan/index');
        } else {
            $this->template->load('template', 'listpermintaan/index');
        }
    }

    public function printPdf($id, $jenisSurat, $nik)
    {
        $penduduk = $this->Penduduk_model->getPenduduk($nik);

        $jenisSurat = str_replace('-', ' ', $jenisSurat);

        if ($jenisSurat == 'surat pindah')
            $this->CetakSurat_model->suratPindah($jenisSurat);
        elseif ($jenisSurat == 'surat tidak mampu')
            $this->CetakSurat_model->suratTidakMampu($jenisSurat);
        elseif ($jenisSurat == 'surat kuasa')
            $this->CetakSurat_model->suratKuasa($jenisSurat);
        elseif ($jenisSurat == 'surat usaha')
            $this->CetakSurat_model->suratUsaha($id, $penduduk);
        elseif ($jenisSurat == 'surat kelahiran') {
            $page1 = $this->load->view('cetak/surat-kelahiran', '', true);
            $html = [$page1];
            $this->CetakSurat_model->printFromView($html, count($html));
        } elseif ($jenisSurat == 'surat kematian') {
            $page1 = $this->load->view('cetak/surat-kematian', '', true);
            $page2 = $this->load->view('cetak/surat-kematian2', '', true);
            $html = [$page1, $page2];

            $this->CetakSurat_model->printFromView($html, count($html));
        } elseif ($jenisSurat == 'skck') {
            // $page1 = $this->load->view('cetak/surat-skck', '', true);
            // $page2 = $this->load->view('cetak/surat-skck2', '', true);
            // $page3 = $this->load->view('cetak/surat-skck3', '', true);
            // $html = [$page1, $page2, $page3];

            // $this->CetakSurat_model->printFromView($html, count($html));
            $this->CetakSurat_model->skck($jenisSurat);
        }
    }
}
