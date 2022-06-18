<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jenis_surat_model');
        $this->load->model('KartuKeluarga_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Akun_model');
        $this->load->model('PermintaanSurat_model');
        $this->data['page_title'] = 'Dashboard';
    }

    public function index()
    {
        //$this->load->view('table');
        $this->data['total_jenis_surat'] = $this->Jenis_surat_model->getAllData() != null ? count($this->Jenis_surat_model->getAllData()) : 0;
        $this->data['total_kartu_keluarga'] = $this->KartuKeluarga_model->getAllData() != null ? count($this->KartuKeluarga_model->getAllData()) : 0;
        $this->data['total_penduduk'] = $this->Penduduk_model->getAllData() != null ? count($this->Penduduk_model->getAllData()) : 0;
        $this->data['total_admin'] = $this->Akun_model->getAllData() != null ? count($this->Akun_model->getAllData()) : 0;
        $this->data['total_surat_selesai'] = $this->PermintaanSurat_model->getSuratByStatus('selesai') != null ? count($this->PermintaanSurat_model->getSuratByStatus('selesai')) : 0;
        $this->data['total_surat_pending'] = $this->PermintaanSurat_model->getSuratByStatus('pending') != null ? count($this->PermintaanSurat_model->getSuratByStatus('pending')) : 0;
        $this->data['total_surat_diproses'] = $this->PermintaanSurat_model->getSuratByStatus('diproses') != null ? count($this->PermintaanSurat_model->getSuratByStatus('diproses')) : 0;
        $this->data['total_surat_ditolak'] = $this->PermintaanSurat_model->getSuratByStatus('ditolak') != null ? count($this->PermintaanSurat_model->getSuratByStatus('ditolak')) : 0;
        $this->data['januari'] = $this->PermintaanSurat_model->getSuratByMonth(1) != null ? count($this->PermintaanSurat_model->getSuratByMonth(1)) : 0;
        $this->data['februari'] = $this->PermintaanSurat_model->getSuratByMonth(2) != null ? count($this->PermintaanSurat_model->getSuratByMonth(2)) : 0;
        $this->data['maret'] = $this->PermintaanSurat_model->getSuratByMonth(3) != null ? count($this->PermintaanSurat_model->getSuratByMonth(3)) : 0;
        $this->data['april'] = $this->PermintaanSurat_model->getSuratByMonth(4) != null ? count($this->PermintaanSurat_model->getSuratByMonth(4)) : 0;
        $this->data['mei'] = $this->PermintaanSurat_model->getSuratByMonth(5) != null ? count($this->PermintaanSurat_model->getSuratByMonth(5)) : 0;
        $this->data['juni'] = $this->PermintaanSurat_model->getSuratByMonth(6) != null ? count($this->PermintaanSurat_model->getSuratByMonth(6)) : 0;
        $this->data['juli'] = $this->PermintaanSurat_model->getSuratByMonth(7) != null ? count($this->PermintaanSurat_model->getSuratByMonth(7)) : 0;
        $this->data['agustus'] = $this->PermintaanSurat_model->getSuratByMonth(8) != null ? count($this->PermintaanSurat_model->getSuratByMonth(8)) : 0;
        $this->data['september'] = $this->PermintaanSurat_model->getSuratByMonth(9) != null ? count($this->PermintaanSurat_model->getSuratByMonth(9)) : 0;
        $this->data['oktober'] = $this->PermintaanSurat_model->getSuratByMonth(10) != null ? count($this->PermintaanSurat_model->getSuratByMonth(10)) : 0;
        $this->data['november'] = $this->PermintaanSurat_model->getSuratByMonth(11) != null ? count($this->PermintaanSurat_model->getSuratByMonth(11)) : 0;
        $this->data['desember'] = $this->PermintaanSurat_model->getSuratByMonth(12) != null ? count($this->PermintaanSurat_model->getSuratByMonth(12)) : 0;

        $this->template->load('template', '_partials/content', $this->data);
    }

    public function form()
    {
        //$this->load->view('table');
        $this->template->load('template', 'form');
    }

    function autocomplate()
    {
        autocomplate_json('tbl_user', 'full_name');
    }

    function __autocomplate()
    {
        $this->db->like('nama_lengkap', $_GET['term']);
        $this->db->select('nama_lengkap');
        $products = $this->db->get('pegawai')->result();
        foreach ($products as $product) {
            $return_arr[] = $product->nama_lengkap;
        }

        echo json_encode($return_arr);
    }

    function pdf()
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        $pdf->Output();
    }
}
