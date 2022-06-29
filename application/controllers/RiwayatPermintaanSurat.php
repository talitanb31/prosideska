<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RiwayatPermintaanSurat extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->library('Pdf');
        $this->load->model('PermintaanSurat_model');
        $this->load->model('Jenis_surat_model');
        $this->load->model('CetakSurat_model');
        $this->load->model('Penduduk_model');
        $this->data['page_title'] = 'Riwayat Permintaan Surat';
    }

    public function index()
    {
        $jenis = $this->input->get('jenis');

        $this->data['data'] = $this->PermintaanSurat_model->getAllDataRiwayat($jenis);
        $this->data['jenisSurat'] = $this->Jenis_surat_model->getAllData();

        $this->template->load('template', 'riwayat/index', $this->data);
    }

    public function printPdf($id, $jenisSurat, $nik)
    {
        $penduduk = $this->Penduduk_model->getPenduduk($nik);

        $jenisSurat = str_replace('-', ' ', $jenisSurat);

        if ($jenisSurat == 'surat pindah')
            $this->CetakSurat_model->suratPindah($jenisSurat);
        elseif ($jenisSurat == 'surat tidak mampu')
            $this->CetakSurat_model->suratTidakMampu($id, $penduduk);
        elseif ($jenisSurat == 'surat kematian')
            $this->CetakSurat_model->suratKematian($id, $data, $penduduk);
        elseif ($jenisSurat == 'surat kuasa')
            $this->CetakSurat_model->suratKuasa($id, $penduduk);
        elseif ($jenisSurat == 'surat usaha')
            $this->CetakSurat_model->suratUsaha($id, $penduduk);
        elseif ($jenisSurat == 'surat kelahiran') {
            // $page1 = $this->load->view('cetak/surat-kelahiran', '', true);
            // $html = [$page1];
            // $this->CetakSurat_model->printFromView($html, count($html));
            $this->CetakSurat_model->suratKelahiran($id, $penduduk);
            // } elseif ($jenisSurat == 'surat kematian') {
            //     $page1 = $this->load->view('cetak/surat-kematian', '', true);
            //     $page2 = $this->load->view('cetak/surat-kematian2', '', true);
            //     $html = [$page1, $page2];

            //     $this->CetakSurat_model->printFromView($html, count($html));
        } elseif ($jenisSurat == 'surat keterangan cacatan kepolisian') {
            // $page1 = $this->load->view('cetak/surat-skck', '', true);
            // $page2 = $this->load->view('cetak/surat-skck2', '', true);
            // $page3 = $this->load->view('cetak/surat-skck3', '', true);
            // $html = [$page1, $page2, $page3];

            // $this->CetakSurat_model->printFromView($html, count($html));
            $this->CetakSurat_model->skck($id, $nik, $penduduk);
        } elseif ($jenisSurat == 'surat keterangan perjalanan') {
            $this->CetakSurat_model->suketPerjalanan($id, $nik, $penduduk);
        } elseif ($jenisSurat == 'surat keterangan belum menikah') {
            $this->CetakSurat_model->suketBelumMenikah($id, $nik, $penduduk);
        } elseif ($jenisSurat == 'surat keterangan kehilangan') {
            $this->CetakSurat_model->suketPengantarKehilangan($id, $nik, $penduduk);
        } elseif ($jenisSurat == 'surat perwalian') {
            $this->CetakSurat_model->suketPerwalian($id, $nik, $penduduk);
        } elseif ($jenisSurat == 'surat keterangan pindah') {
            $this->CetakSurat_model->suratPindah($id, $nik, $penduduk);
        }
    }
}
