<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

class CetakSurat_model extends CI_Model
{

    private $pdf;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $this->pdf = new pdf('P', 'mm', 'Legal');
        $this->pdf->AddPage();
    }

    private function getDetailSurat($id)
    {
        $this->db->select('permintaan_surat.form_data');

        return $this->db->get_where('permintaan_surat', ['permintaan_surat.id' => $id])->row_array();
    }

    private function header()
    {
        // Logo
        $this->pdf->Image('assets/img/madiun.gif', 10, 6, 30);
        // Arial bold 15
        $this->pdf->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->pdf->Cell(80);
        // Title
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, 'PEMERINTAH KABUPATEN MAGETAN', 0, 0, 'C');
        // Line break
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'KECAMATAN MAGETAN', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial', 'B', 15);
        $this->pdf->Cell(30, 10, 'KELURAHAN SUKOWINANGUN', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, 'Jalan Kunti Nomor 03 Telp. (0351) 893440', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10, 'e-mail : ');
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(17);
        $this->pdf->Cell(30, 10, 'magetankelsukowinangun@gmail.com', 0, 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(85);
        $this->pdf->Cell(20, 10, 'MAGETAN', 0, 0, 'C');
        $this->pdf->Ln(10);
    }

    private function header2()
    {
        // Logo
        $this->pdf->Image('assets/img/madiun.gif', 10, 6, 30);
        // Arial bold 15
        $this->pdf->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->pdf->Cell(80);
        // Title
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, 'PEMERINTAH KABUPATEN MAGETAN', 0, 0, 'C');
        // Line break
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'KECAMATAN MAGETAN', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial', 'B', 15);
        $this->pdf->Cell(30, 10, 'KELURAHAN SUKOWINANGUN', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, 'Jalan Kunti Nomor 03 Telp. (0351) 893440', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10, 'e-mail : ');
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(17);
        $this->pdf->Cell(30, 10, 'magetankelsukowinangun@gmail.com', 0, 0, 'C');
        $this->pdf->Ln(10);
    }

    public function printFromView($html, $totalPage)
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4', 'orientation' => 'P']);

        for ($i = 0; $i < $totalPage; $i++) {
            $mpdf->WriteHTML($html[$i]);
            if (($i + 1) < $totalPage)
                $mpdf->AddPage();
        }
        $mpdf->Output();
    }

    public function suratUsaha($idSurat, $data)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);

        // var_dump($detailSurat);

        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'UB', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN USAHA', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 504 /       / 403.401.07 / 2022', 0, 0, 'C');

        $this->pdf->Ln(15); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(60, 10, 'Yang bertanda tangan di bawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 0, '');
        $this->pdf->Ln(8);
        $this->pdf->Cell(10);
        $this->pdf->Cell(60, 10, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa:', 0, 0, '');
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(60, 10, 'I. Yang bertanda tangan di bawah ini :', 0, 0, '');
        // $this->pdf->Ln(6);
        // $this->pdf->Cell(10);
        // /* Start Child Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(60, 10, 'a. Nama Lengkap', 0, 0, '');
        // $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        // $this->pdf->SetFont('Arial', '', 12);
        // $this->pdf->Cell(30, 10, 'NUR CAHYONO', 0, 0, '');
        // /* End Child Row */

        // $this->pdf->Ln(6);

        // /* Start Child Row */
        // $this->pdf->Cell(10);
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(60, 10, 'b. Jabatan', 0, 0, '');
        // $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        // $this->pdf->SetFont('Arial', '', 12);
        // $this->pdf->Cell(30, 10, 'Kepala Desa Sidorejo', 0, 0, '');
        // /* End Child Row */
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(3);
        // $this->pdf->Cell(60, 10, 'Dengan ini menerangkan bahwa :', 0, 0, '');
        // $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['nama'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['tempat_lahir'] . ',' . $data['tanggal_lahir'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['jenis_kelamin'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['agama'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['pekerjaan'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $data['nik'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(0, 10, $data['alamat'], 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(60, 10, 'Menerangkan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, 'Bahwa orang tersebut diatas benar-benar penduduk Kel. Sukowinangun Kec. Magetan. Dan mempunyai Usaha ' . $detailSurat->bidang_usaha . '.', 0, ['L', 'B'], '');
        /* End Child Row */

        /* End Row */

        /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(10, 10, 'II. ', 0, 0, 'L');
        // $this->pdf->Ln(2.6);
        // $this->pdf->Cell(5);
        // $this->pdf->MultiCell(0, 5, 'Orang tersebut di atas benar-benar penduduk Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun dan benar-benar memiliki usaha dibidang ' . $detailSurat->bidang_usaha, 0, 'L', '');
        // $this->pdf->Ln(4);
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(25, 10);
        $this->pdf->Cell(0, 10, 'Surat keterangan ini diberikan kepada yang bersangkutan untuk persyaratan', 0, 'L', '');
        $this->pdf->Ln(8);
        $this->pdf->Cell(10);
        $this->pdf->Cell(60, 10, 'pengajuan Pinjaman ke Bank Mandiri.', 0, 'L', '');
        $this->pdf->Ln(6);
        /* End Row */

        /* Start Row */
        $this->pdf->Cell(25, 10);
        $this->pdf->Cell(0, 10, 'Demikian  surat  keterangan  ini  kami  buat dengan sebenar- benarnya  dan mohon', 0, 'L', '');
        $this->pdf->Ln(8);
        $this->pdf->Cell(10);
        $this->pdf->Cell(60, 10, 'dapat dipergunakan sebagaimana mestinya.', 0, 'L', '');
        $this->pdf->Ln(4);
        /* Start Child Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();
    }

    public function suratKelahiran($idSurat, $data)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);

        // var_dump($detailSurat);

        // Header
        $this->header($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'UB', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN KELAHIRAN', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 474 /       / 403.406.07 / 2022', 0, 0, 'C');

        $this->pdf->Ln(15); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(60, 10, 'Yang bertanda tangan di bawah ini Lurah Sukowinangun Kecamatan Magetan Kabupaten', 0, 0, '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(10);
        $this->pdf->Cell(40, 10, 'Magetan menerangkan dengan sebenarnya bahwa :', 0, 0, '');

        $this->pdf->Ln(8); // new line

        /* Start Row */
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nama_anak, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->tempat_dilahirkan . ', ' . $detailSurat->tanggal_lahir, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->jenis_kelamin, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->agama_anak, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, isset($detailSurat->pekejaan_anak) ? $detailSurat->pekejaan_anak : '-', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nik_anak, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, $detailSurat->alamat_anak, 0, 0, '');
        /* End Child Row */

        /* End Row */

        $this->pdf->Ln(10);
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Tersebut diatas adalah Anak dari Suami / Istri yang syah');
        $this->pdf->Ln(6);

        /* Start Row */
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Nama Ayah', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nama_ayah, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->tempat_lahir_ayah . ', ' . $detailSurat->tanggal_lahir_ayah, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->agama_ayah, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Kewarganegaraan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->agama_ayah, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, isset($detailSurat->pekejaan_ayah) ? $detailSurat->pekejaan_ayah : '-', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nik_ayah, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, 'RT ' . $detailSurat->rt_ayah . ' RW ' . $detailSurat->rw_ayah . ' Kel/Desa ' . $detailSurat->desa_ayah . ' Kec ' . $detailSurat->kecamatan_ayah . ' Kab ' . $detailSurat->kab_ayah, 0, 0, '');
        /* End Child Row */

        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Nama Ibu', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nama_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->tempat_lahir_ibu . ', ' . $detailSurat->tanggal_lahir_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->jenis_kelamin_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->agama_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, isset($detailSurat->pekejaan_ibu) ? $detailSurat->pekejaan_ibu : '-', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 10, $detailSurat->nik_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, 'RT ' . $detailSurat->rt_ibu . ' RW ' . $detailSurat->rw_ibu . ' Kel/Desa ' . $detailSurat->desa_ibu . ' Kec ' . $detailSurat->kecamatan_ibu . ' Kab ' . $detailSurat->kab_ibu, 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);

        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, 'Keterangan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->MultiCell(0, 10, 'Dipergunakan untuk Persyaratan membuat akta kelahiran', 0, ['L', 'B'], '');
        /* End Child Row */

        /* End Row *

        /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(10, 10, 'II. ', 0, 0, 'L');
        // $this->pdf->Ln(2.6);
        // $this->pdf->Cell(5);
        // $this->pdf->MultiCell(0, 5, 'Orang tersebut di atas benar-benar penduduk Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun dan benar-benar memiliki usaha dibidang ' . $detailSurat->bidang_usaha, 0, 'L', '');
        // $this->pdf->Ln(4);
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(25, 10);
        $this->pdf->Cell(0, 10, 'Demikian Surat Keterangan Kelahiran ini kami buat. Mohon dapatnya dipergunakan', 0, 'L', '');
        $this->pdf->Ln(8);
        $this->pdf->Cell(10);
        $this->pdf->Cell(0, 6, 'sebagaimana mestinya.', 0, 'L', '');
        $this->pdf->Ln(6);
        /* End Row */


        $this->pdf->Ln(8); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(73);
        $this->pdf->Cell(30, 10, 'Magetan, ' . date('d M yyyy'), 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(51);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(40, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(132);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(120);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();
    }

    public function suratKuasa($id, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($id);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($detailSurat);
        // Header
        // $this->header($this->pdf);

        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KUASA', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(45, 10);
        $this->pdf->Cell(30, 10, 'Yang bertanda tangan di bawah ini Saya:', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Tempat, tanggal lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(50, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, $penduduk['alamat'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(11); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Selanjutnya disebut pihak pertama.', 0, 0, '');
        $this->pdf->Ln(8); // new line
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(25, 10);
        $this->pdf->Cell(60, 10, 'Dengan ini saya memberikan kuasa sepenuhnya kepada : ', 0, 0, '');
        $this->pdf->Cell(10, 10, '', 0, 0, 'C');
        /* End Row */

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 'B', 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, $detailSurat->nama_penerima, 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Tempat, tanggal lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(50, 10, $detailSurat->tempat_lahir_penerima . ', ' . $detailSurat->taggal_lahir_penerima, 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, $detailSurat->nik_penerima, 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(30, 10, 'RT. ' . $detailSurat->rt_penerima . ' RW. ' . $detailSurat->rw_penerima . ' Desa ' . $detailSurat->desa_penerima . ' Kec. ' . $detailSurat->kecamatan_penerima . ' Kab. ' . $detailSurat->kab_penerima, 0, 0, '');
        /* End Row */

        $this->pdf->Ln(11); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(15, 10);
        $this->pdf->Cell(60, 10, 'Selanjutnya disebut pihak kedua', 0, 0, '');;
        /* End Row */

        $this->pdf->Ln(12); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(25, 10);
        $this->pdf->Cell(10, 10, 'Keperluan untuk Mengurus dan Mengambil Buku / Kutipan Akta Nikah di KUA Jatiuwung Kab', 0, 0, '');
        $this->pdf->Ln(5);
        $this->pdf->Cell(15, 20);
        $this->pdf->Cell(60, 10, 'Tanggerang Jawa Barat.', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(40, 10, 'Penerima Kuasa', 0, 0, 'C');
        $this->pdf->Cell(50, 10);
        $this->pdf->Cell(40, 10, 'Yang Memberi Kuasa', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(20, 10, '', 0, 0, '');
        $this->pdf->Cell(40, 10, '(Pihak Kedua)', 0, 0, 'C');
        $this->pdf->Cell(50);
        $this->pdf->Cell(40, 10, '(Pihak Pertama)', 0, 0, 'C');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(18);
        $this->pdf->Cell(
            50,
            10,
            $penduduk['nama'],
            0,
            0,
            'C'
        );
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, $detailSurat->nama_penerima, 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, 'Mengetahui,', 0, 0, 'C');
        $this->pdf->Ln(4);
        $this->pdf->Cell(0, 10, 'Lurah Sukowinangun', 0, 0, 'C');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(0, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(4);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, '19680423 199602 1 001', 0, 0, 'C');

        $this->pdf->Output();
    }

    public function suratTidakMampu($data)
    {
        // Header
        $this->header($this->pdf);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN TIDAK MAMPU', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 145/     /403.406.07/ 2022', 0, 0, 'C');

        $this->pdf->Ln(15); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10,10);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(60, 0, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */

        /* Start Child Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'RUSWENDA', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Tempat, Tanggal Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Brebes, 21-03-1983', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, '3520065811080003', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Laki-laki', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Status Perkawinan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Kawin', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Islam', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Wiraswasta', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, 'Jl .S Parman RT.05 RW.02 Kel.Sukowinangun, Kec.Magetan', 0, ['L', 'B'], '');
        /* End Child Row */
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2.6);
        $this->pdf->Cell(10);
        $this->pdf->MultiCell(0, 5, 'Berdasarkan surat pengantar RT 005 RW 002 No.01/RT.05/RW.02/SKW/2022.', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(0,10, 'Tangggal 14 Maret 2022 bahwa yang bersangkutan di atas benar-benar Keluarga Tidak Mampu',0,'');   
        $this->pdf->Ln(8);
        $this->pdf->Cell(10,10);
        $this->pdf->Cell(0,10, 'Surat keterangan ini untuk Persyaratan Beasiswa PIP atas nama :',0,'L','');
         /* End Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'WENI NOVITASARI', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, '3520065811080003', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Magetan, 18-11-2008', 0, 0, '');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Sekolah', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'SMP Negeri 4 Magetan', 0, 0, '');
        /* End Child Row */

       /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(12);
        $this->pdf->Cell(10);
        $this->pdf->MultiCell(0, 5, 'Surat keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(0,10, 'perundangan-undangan dan Perda Kab Magetan serta apabila ada kekeliruan/kesalahan dalam ',0,'');   
        $this->pdf->Ln(8);
        $this->pdf->Cell(0,10, 'pembuatannya pemohon/pemegang bersedia mempertanggungjawabkan secara hukum tanpa',0,'');
        $this->pdf->Ln(8);
        $this->pdf->Cell(0,10, 'melibatkan pihak manapun.',0,'');
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->Ln(10);
        $this->pdf->Cell(0,10, 'Surat Keterangan ini berlaku untuk satu kali Keperluan',0,'');
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(10);
        $this->pdf->Cell(10);
        $this->pdf->MultiCell(0, 5, 'Demikian Surat Keterangan ini kami buat, untuk dipergunakan sebagaimana mestinya', 0, 'L', '');
        /* End Row */
       
        $this->pdf->Ln(15); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);   
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();
    }

    public function suratPindah($data)
    {
        /* Halaman 1 */
        // Header
        $this->header($this->pdf);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN PINDAH TEMPAT', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 471.21 / 219 / 402.315. 10 / 2019', 0, 0, 'C');

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '1. Nama Lengkap', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'NUR CAHYONO', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '2. Jenis kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Laki-laki', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '3. Tempat Tgl. lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(50, 10, 'Madiun, 08 Agustus 1999,', 0, 0, '');
        $this->pdf->Cell(4);
        $this->pdf->Cell(30, 10, 'Umur : 20 tahun', 0, 1, '');
        /* End Row */

        // $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '4. Kewarganegaraan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'WNI', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '5. Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Islam', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '6. Status Pernikahan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Belum Kawin', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '7. Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Belum Pelajar/Mahasiswa', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '8. Pendidikan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'TAMAT SD/SEDERAJAT', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '9. Alamat Asal', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'RT. 16 RW. 08 Desa Sidorejo Kecamatan Kebonsari', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '10. Nomor Induk Kependudukan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, '3511192812000001', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '11. Pindah ke', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'JL. M. ISWAHYUDI RT. 02 RW. 00', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Kelurahan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->Cell(30, 10, 'RINDING', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Kecamatan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->Cell(30, 10, 'TELUK BAYUR', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Kabupaten/Kota', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->Cell(30, 10, 'BERAU', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Provinsi', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->Cell(30, 10, 'KALIMANTAN TIMUR', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'Pada Tanggal', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->Cell(30, 10, '30 Desember 2019', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '12. Alasan Pindah', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, 'PEKERJAAN', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(60, 10, '13. Pengikut', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, '- Orang', 0, 0, '');
        /* End Row */

        /* Table */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(10, 20, 'No.', 'L:1, T:1, B:1', 0, '');
        $this->pdf->Cell(30, 20, 'Nama', 1, 0, 'C');
        // $this->pdf->MultiCell(8,10,'JKL/P',1,'C');
        $this->pdf->Cell(8, 20, 'L/P', 'T:1, B:1', 'C');
        $this->pdf->Cell(15, 20, 'Umur', 1, 0, 'C');
        $this->pdf->Cell(30, 20, 'Status Perkawinan', 'T:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, 'Pendidikan', 1, 0, 'C');
        $this->pdf->Cell(30, 20, 'No. KTP', 'T:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, 'Keterangan', 1, 0, 'C');
        /* End Row */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(10, 20, '', 'L:1, B:1', 0, '');
        $this->pdf->Cell(30, 20, '', 'L:1, B:1', 0, 'C');
        $this->pdf->Cell(8, 20, '', 'L:1, B:1', 'C');
        $this->pdf->Cell(15, 20, '', 'L:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, '', 'L:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, '', 'L:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, '', 'L:1, B:1', 0, 'C');
        $this->pdf->Cell(30, 20, '', 'L:1, B:1, R:1', 0, 'C');
        /* End Row */

        /* End Table */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(30, 10, 'Mengetahui,', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30, 10, 'Sidorejo, 30 Desember 2019', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30, 10, 'Camat Kebonsari', 0, 0, '');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30, 10, 'Kepala Desa Sidorejo', 0, 0, 'C');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'U', 10);
        $this->pdf->Cell(25);
        $this->pdf->Cell(40, 10, '_____________________', 0, 0, '');
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(40, 10, 'ANA SETYAWATI', 0, 0, 'C');

        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(25);
        $this->pdf->Cell(30, 10, 'Nip.', 0, 0, '');

        /* End Row */
        /* End Halaman 1 */

        /* Halaman 2 */
        $this->pdf->AddPage();

        /* Start Header */
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(90);
        $this->pdf->Cell(20, 10, 'F. 1-06', 1, 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(0, 10, 'SURAT KETERANGAN PINDAH-DATANG WNI', 0, 0, 'C');
        /* End Header */

        $this->pdf->Ln(8);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Cell(30, 10, 'DATA DAERAH ASAL', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '1. Nomor Kartu Keluarga', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 8, '', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '', 'T:1, B:1, R:1', 0, 'C');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '2. Nama Kepala Keluarga', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'SUJITO', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '3. Alamat', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // $this->pdf->Cell(10);
        $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 8, 'a. Desa/Kelurahan', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'SIDOREJO', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(15, 8, 'c. Kab/Kota', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'MADIUN', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 8, 'b. Kecamatan', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'KEBONSARI', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(15, 8, 'd. Provinsi', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'JAWA TIMUR', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(59);
        $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        $this->pdf->Cell(7);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(6, 8, '6', 1, 0, 'C');
        $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8);
        $this->pdf->Cell(12, 8, 'Telepon', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(4);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Cell(30, 10, 'DATA KEPINDAHAN', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '1. Alasan Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, 'PEKERJAAN', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '2. Alamat Tujuan Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // $this->pdf->Cell(10);
        $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 8, 'a. Desa/Kelurahan', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'SIDOREJO', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(15, 8, 'c. Kab/Kota', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'MADIUN', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 8, 'b. Kecamatan', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'KEBONSARI', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(15, 8, 'd. Provinsi', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, 'JAWA TIMUR', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(59);
        $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        $this->pdf->Cell(7);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(6, 8, '6', 1, 0, 'C');
        $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8);
        $this->pdf->Cell(12, 8, 'Telepon', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '3. Klasifikasi Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'Antar Kabupaten/Kota atau Antar Provinsi', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '4. Jenis Kepindahan', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'Kepala Keluarga', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(22, 5, '5. Status Nomor KK', 0, 0, 'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(8, 8, '8', 1, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(8, 5, '1. Numpang KK', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 5, '3. Tidak ada Angg. Keluarga yang Ditinggal', 0, 0, 'L');
        $this->pdf->Ln(5);
        $this->pdf->Cell(68, 5, 'Bagi Yang Tidak Pindah', 0, 'L', '');
        $this->pdf->Cell(8, 5, '2. Membuat KK Baru', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 5, '4. Nomor KK Tetap', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(22, 5, '6. Status Nomor KK', 0, 0, 'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(8, 8, '-', 1, 0, 'C');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(8, 5, '1. Numpang KK', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 5, '2. Membuat KK Baru', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 5, '3. Nomor KK Tetap', 0, 0, 'L');
        $this->pdf->Ln(5);
        $this->pdf->Cell(68, 5, 'Bagi Yang Pindah', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30, 8, '7. Rencana Tgl. Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 8, '3', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(8, 8, '1', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(8, 8, '2', 1, 0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->Cell(30, 8, '8. Keluarga Yang Pindah', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->Cell(10, 5, 'No.', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(80, 5, 'NIK', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(80, 5, 'Nama', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(20, 5, 'SHDK', 'L:1, T:1, R:1', 0, 'C');
        /* Start Child Row */
        $this->pdf->Ln(5);
        $this->pdf->Cell(10, 6, '1', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '3', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '5', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '1', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '9', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '1', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '8', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '8', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '9', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '9', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(5, 6, '1', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(80, 6, 'NUR CAHYONO', 'L:1, T:1, R:1', 0, 'L');
        $this->pdf->Cell(10, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        $this->pdf->Cell(10, 6, '0', 'L:1, T:1, R:1', 0, 'C');
        /* End Child Row */
        $this->pdf->Ln(0);
        $this->pdf->Cell(0, 6, '', 'B:1', 0, '');
        /* End Row */

        $this->pdf->Ln(5);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(30, 10, 'Diketahui Oleh : ,', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30, 10, 'Sidorejo, 30 Desember 2019', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30, 10, 'Camat', 0, 0, '');
        $this->pdf->Cell(62);
        $this->pdf->Cell(30, 10, 'Kepala Desa Sidorejo', 0, 0, '');
        $this->pdf->Ln(5); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30, 10, 'No ............................, Tgl', 0, 0, '');
        $this->pdf->Cell(62);
        $this->pdf->Cell(30, 10, 'No ............................, Tgl', 0, 0, '');
        $this->pdf->Ln(13); // new line
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(40, 10, '......................................................', 0, 0, '');
        $this->pdf->Cell(52);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(40, 10, '......................................................', 0, 0, '');
        /* End Row */
        /* End Halaman 2 */

        /* Halaman 3 */
        $this->pdf->AddPage();

        /* Start Header */
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(90);
        $this->pdf->Cell(20, 10, 'F. 1-07', 1, 0, 'C');
        $this->pdf->Ln(4);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(16, 8, 'No. KK', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(12, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(10);
        $this->pdf->Cell(10, 8, '3511182312000001', 0, 0, 'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(16, 8, 'NIK', 0, 0, 'L');
        $this->pdf->Cell(10);
        $this->pdf->Cell(12, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(10);
        $this->pdf->Cell(10, 8, '3511182312000001', 0, 0, 'C');
        $this->pdf->Image('assets/img/pancasila.png', 95, 28, 16);
        $this->pdf->Ln(28);
        $this->pdf->SetFont('Arial', 'BU', 14);
        $this->pdf->Cell(0, 10, 'BIODATA PENDUDUK WARGA NEGARA INDONESIA', 0, 0, 'C');
        /* End Header */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Cell(30, 10, 'DATA PERSONAL', 0, 0, 'L');
        $this->pdf->Ln(6);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '1.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Lengkap', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'NUR CAHYONO', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(5);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '2.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tempat Lahir', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'MADIUN', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '3.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Lahir', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '08-08-1999', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '4.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Jenis Kelamin', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'LAKI-LAKI', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '5.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Golongan Darah', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '6.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Agama', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'ISLAM', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '7.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Pendidikan Akhir', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'TAMAT SD/SEDERAJAT', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '8.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Pekerjaan', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'PELAJAR/MAHASISWA', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '9.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Penyandang Cacat', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '10.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Status Perkawinan', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'BELUM KAWIN', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '11.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Status Hubungan Dalam Keluarga', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'ANAK', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '12.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'NIK Ibu', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519017112770033', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '13.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Ibu', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'RUSLINA', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '14.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'NIK Ayah', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519013112650089', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '15.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Ayah', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'SUJITO', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '16.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Alamat Sebelumnya', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->MultiCell(70, 8, 'RT. 16 RW. 08', 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '17.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Alamat Sekarang', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->MultiCell(70, 8, 'RT. 16 RW. 08', 0, 'L');
        /* End Row */

        // $this->pdf->Ln(2);

        /* Start Row */
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Cell(30, 10, 'DATA KEPEMILIKAN DOKUMEN', 0, 0, 'L');
        $this->pdf->Ln(6);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '18.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Kartu Keluarga (No. KK)', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519012401980452', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '19.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Paspor', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '20.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Berakhir Paspor', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '21.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta/Surat Kenal Lahir', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '03287/UM/066/1999', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '22.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta Perkawinan/Buku Nikah', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '23.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Perkawinan', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '24.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta Perceraian/Surat Cerai', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(5, 8, '25.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Perceraian', 0, 0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6); // new line

        $this->pdf->AddPage();

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30, 10, 'Sidorejo, 30 Desember 2019', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(26);
        $this->pdf->Cell(50, 10, 'Penerima Kuasa', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->Cell(30, 10, 'Pemberi Kuasa', 0, 0, 'L');
        $this->pdf->Ln(15); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(28);
        $this->pdf->Cell(50, 10, 'SITI ASIYAH', 0, 0, 'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(40, 10, 'DRS. MOH. MAKSUM', 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Ln(5);

        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 10, 'Mengetahui,', 0, 0, 'C');
        $this->pdf->Ln(4);
        $this->pdf->Cell(0, 10, 'Kepala Desa Sidorejo', 0, 0, 'C');
        $this->pdf->Ln(15); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(0, 10, 'ANA SETYAWATI', 0, 0, 'C');

        /* End Halaman 3 */

        $this->pdf->Output();
    }

    public function skck($idSurat, $nik, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($penduduk);
        // var_dump($detailSurat);
        /* Halaman 1 */
        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT PENGANTAR SKCK', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 474/   /403.406.07/2022', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(10);
        $this->pdf->Cell(60, 0, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(4); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20, 10);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['jenis_kelamin'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['agama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Status Perkawinan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['status_pernikahan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Kewarganegaraan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['country_name'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['pekerjaan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 5, $penduduk['alamat'], 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 15);
        $this->pdf->MultiCell(0, 10, 'Bahwa orang tersebut diatas benar-benar, berkelakuan baik dan belum pernah', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(50, 0, 'terkena Tindak Pidana Apapun.', 0, 0, '');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 15);
        $this->pdf->Ln(1);
        $this->pdf->Cell(10, 15);
        $this->pdf->Cell(50, 10, 'Surat keterangan ini akan dipergunakan untuk persyaratan Membuat SKCK di Polsek', 0, 'L', '');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(5);
        $this->pdf->Cell(20, 10, 'Magetan.', 0, 0, '');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 15);
        $this->pdf->Ln(8);
        $this->pdf->Cell(10, 15);
        $this->pdf->MultiCell(0, 10, 'Demikian surat keterangan ini dibuat dengan sebanar-benarnya dan mohon dapat', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20, 0, 'dipergunakan sebagaimana mestinya.', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);   
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();

        /* End Halaman 1 */

        /* Halaman 2 */
        // $this->pdf->AddPage();

        // /* Start Header */
        // $this->pdf->SetFont('Arial', 'B', 14);
        // $this->pdf->Cell(80);
        // $this->pdf->Cell(90);
        // $this->pdf->Cell(20, 10, 'F. 1-06', 1, 0, 'C');
        // $this->pdf->Ln(10);
        // $this->pdf->MultiCell(0, 15, 'FORMULIR BIODATA PENDUDUK UNTUK PERUBAHAN DATA WARGA NEGARA IDONESIA', 0, 'C', '');
        // /* End Header */

        // $this->pdf->Ln(8);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(60, 10, 'I. DATA WILAYAH', 0, 0, '');
        // /* End Row */

        // $this->pdf->Ln(8);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '1. Kota-Nama Propinsi', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '3', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(0, 8, 'JAWA TIMUR', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '2. Kota-Nama Kabupaten/Kota', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '1', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(0, 8, 'MADIUN', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '3. Kota-Nama Kecamatan', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(0, 8, 'KEBONSARI', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '4. Kota-Nama Kelurahan/Desa', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '2', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(0, 8, 'SIDOREJO', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(60, 10, 'II. DATA KELUARGA', 0, 0, '');
        // /* End Row */

        // $this->pdf->Ln(8);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '1. Nama Kepala Keluarga', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'SUGIONO', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '2. Nomor Kartu Keluarga',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '3', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '3. Alamat Keluarga', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        // $this->pdf->Cell(5);
        // $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(7);
        // $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Ln(10);
        // $this->pdf->Cell(60);
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // // $this->pdf->Cell(10);
        // $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(59);
        // $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        // $this->pdf->Cell(7);
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(6, 8, '6', 1, 0, 'C');
        // $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8);
        // $this->pdf->Cell(12, 8, 'Telepon', 0, 0, 'L');
        // $this->pdf->Cell(10);
        // $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(30, 10, 'III. DATA INDIVIDU', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(6);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '1. Nama Lengkap', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'RITA HAYU TIARA SARI', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '2. Gelar', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'a. Gelar Akademis, Sebutkan', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'b. Gelar Kebangsawanan, Sebutkan', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'c. Gelar Keagamaan, Sebutkan', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 10, 'Untuk pencatatan gelar lebih lanjut moho dapat mengisi Formulir Pencatatan Gelar', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '3. NIK/No KTP',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '3', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '4', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '4. Alamat Sebelumnya', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        // $this->pdf->Cell(5);
        // $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(7);
        // $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Ln(10);
        // $this->pdf->Cell(60);
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // // $this->pdf->Cell(10);
        // $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 10);
        // $this->pdf->Cell(59);
        // $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        // $this->pdf->Cell(7);
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(6, 8, '6', 1, 0, 'C');
        // $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '7', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(6, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8);
        // $this->pdf->Cell(12, 8, 'Telepon', 0, 0, 'L');
        // $this->pdf->Cell(10);
        // $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '5. No Paspor',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '6. Taggal Berakhir Paspor',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '7. Jenis Kelamin',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'Perempuan', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '8. Tempat Lahir',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'Madiun', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '9. Tanggal Lahir',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '1', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '4', 1, 0, 'C');
        // $this->pdf->Cell(4);
        // $this->pdf->Cell(8, 8, '0', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 1, 0, 'C');
        // $this->pdf->Cell(4);
        // $this->pdf->Cell(8, 8, '1', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '8', 1, 0, 'C');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '10. Umur', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '22', 1, 0, 'C');
        // $this->pdf->Cell(0, 8, 'Tahun', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 9);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '11. Nomor Akte Kelahiran/Surat Kenal',
        //     0,
        //     0,
        //     'L'
        // );
        // // $this->pdf->MultiCell(0, 15, '', 0, 'C', '');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '02047/UM / 41 / 1998', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '12. Golongan Darah',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'A', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(
        //     30,
        //     8,
        //     '13. Agama/Kepercayaan',
        //     0,
        //     0,
        //     'L'
        // );
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'Islam', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '14. Status Perkawinan', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'BELUM KAWIN', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 9);
        // $this->pdf->Cell(30, 8, '15. Nomor Akta Perkawinan/Buku Nikah', 0, 0, 'L');
        // // $this->pdf->MultiCell(30, 8, '15. Nomor Akta Perkawinan/Buku Nikah', 0, 'L', '');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '16. Tanggal Perkawinan', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 9);
        // $this->pdf->Cell(30, 8, '17. Nomor Akta Perceraian/Surat Cerai', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '18. Tanggal Perceraian', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 9);
        // $this->pdf->Cell(30, 8, '19. Status Hubungan Dalam Keluarga', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'ANAK', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '20. Kelainan Fisik dan Mental', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'TIDAK ADA', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '21. Penyandang Cacat', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '-', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '22. Pendidikan Terakhir', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'SLTA/SEDERAJAT', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '23. Jenis Pekerjaan', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'BELUM/TIDAK BEKERJA', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(30, 10, 'IV. DATA ORANG TUA', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(6);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '24. NIK Ibu', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '25. Nama Ibu', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'HANIK ROSIDAH', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '26. NIK Ayah', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(8, 8, '3', 1, 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '9', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '5', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '4', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->Cell(8, 8, '3', 'T:1, B:1, R:1', 0, 'C');
        // $this->pdf->SetFont('Arial', 'B', 10);
        // /* End Row */
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '27. Nama Bapak', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, 'SUGIONO', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(30, 10, 'V. Data Administrasi', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(6);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '1. Nama Ketua RT', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(30, 8, '2. Nama Ketua RW', 0, 0, 'L');
        // $this->pdf->Cell(30);
        // $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(20);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', 'B', 13);
        // $this->pdf->Cell(30, 10, 'Pernyataan', 0, 0, 'L');
        // /* End Row */

        // $this->pdf->Ln(10);
        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->MultiCell(0, 5, 'Demikian formulir ini saya isi dengan sesungguhnya apabila keterangan tersebut tidak sesuai dengan keadaan sebenarnya, saya bersedia dikeakan sanksi sesuai ketentuan peraturan perundang-undangan', 0, 'J', '');
        // /* End Row */

        // $this->pdf->Ln(6);

        // /* Start Row */
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(20);
        // $this->pdf->Cell(50, 10, 'Mengetahui', 0, 0, 'C');
        // $this->pdf->Cell(70);
        // $this->pdf->Cell(1, 10, 'Sidorejo, 30 Desember 2019', 0, 0, 'C');
        // $this->pdf->Ln(4); // new line
        // $this->pdf->Cell(26);
        // $this->pdf->Cell(50, 10, 'Kepala Desa Sidorejo', 0, 0, 'L');
        // $this->pdf->Cell(45);
        // $this->pdf->Cell(30, 10, 'Pemohon', 0, 0, 'L');
        // $this->pdf->Ln(15); // new line
        // $this->pdf->SetFont('Arial', 'UB', 10);
        // $this->pdf->Cell(28);
        // $this->pdf->Cell(50, 10, 'ANA SETYAWATI', 0, 0, 'L');
        // $this->pdf->Cell(38);
        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(40, 10, 'RITA HAYU TIARA SARI', 0, 0, 'C');
        // $this->pdf->Ln(4); // new line
        // $this->pdf->SetFont('Arial', '', 10);
        // /* End Row */

        // $this->pdf->Ln(5);

        // $this->pdf->SetFont('Arial', '', 10);
        // $this->pdf->Cell(0, 10, 'Mengetahui,', 0, 0, 'C');
        // $this->pdf->Ln(4);
        // $this->pdf->Cell(0, 10, 'CAMAT KEBONSARI', 0, 0, 'C');
        // $this->pdf->Ln(15); // new line
        // $this->pdf->SetFont('Arial', 'UB', 10);
        // $this->pdf->Cell(0, 10);                                                                            ', 0, 0, 'C');

        /* End Halaman 2 */

        $this->pdf->Output();
    }

    public function suketPerjalanan($idSurat, $nik, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($penduduk);
        // var_dump($detailSurat);
        /* Halaman 1 */
        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN PERJALANAN', 0, 0, 'C');

        $this->pdf->Ln(); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 147/   /403.406.07/2022', 0, 0, 'C');

        
        $this->pdf->Ln(12); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10,10);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(60, 0, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(4); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['jenis_kelamin'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['agama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['pekerjaan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 0);
        $this->pdf->Cell(60, 10, 'No. KTP', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */
        
        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, $penduduk['alamat'], 0, 'L', '');
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Cell(60, 10, 'Menerangkan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10,'Bahwa nama tersebut diatas adalah benar-benar', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(80,10);
        $this->pdf->Cell(50,0, 'penduduk sesuai dengan alamat di atas yang bersangkutan akan');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80,10);
        $this->pdf->Cell(50,0, 'melakukan perjalanan/berpegian dari RT 03 RW 02 Kel');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80,10);
        $this->pdf->Cell(50,0, 'Sukowinangun Kec Magetan Menuju Papua');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80,10);
        $this->pdf->Cell(50,0, 'Surat Keterangan ini berlaku tanggal 01-09-2022');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 15);
        $this->pdf->MultiCell(0, 10, 'Demikian surat keterangan ini kami buat agar dapat dipergunakan sebagaimana mestinya.', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();

        /* End Halaman 1 */

        $this->pdf->Output();
    }

    public function suketBelumMenikah($idSurat, $nik, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($penduduk);
        // var_dump($detailSurat);
        /* Halaman 1 */
        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN BELUM MENIKAH', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 145/   /403.406.07/2022', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(60, 0, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(4); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['jenis_kelamin'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Kewarganegaraan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['country_name'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['agama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Status Perkawinan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['status_pernikahan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['pekerjaan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, $penduduk['alamat'], 0, 'L', '');
        /* End Row */

         /* Start Row */
         $this->pdf->SetFont('Arial', '', 12);
         $this->pdf->Cell(10, 10);
         $this->pdf->Ln(2);
         $this->pdf->Cell(60, 10, 'Menerangkan', 0, 0, '');
         $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
         $this->pdf->SetFont('Arial', '', 12);
         $this->pdf->MultiCell(0, 10,'Bahwa orang tersebut diatas berdasarkan data Kependudukan ', 0, 'L', '');
         $this->pdf->Ln(2);
         $this->pdf->Cell(69,10);
         $this->pdf->Cell(50,0, ' Kelurahan Sukowinangun benar-benar Belum Menikah');
         /* End Row */
        
         $this->pdf->Ln(3); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Keperluan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10,'Surat keterangan ini diberikan kepada yang bersangkutan untuk ', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Persyaratan Mendaftar Sekolah Kedinasan');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 15);
        $this->pdf->Ln(1);
        $this->pdf->Cell(10, 15);
        $this->pdf->MultiCell(0, 10, 'Demikian untuk menjadikan maklum, mohon dapatnya dipergunakan sebagaimana', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20, 0, ' mestinya.', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();

        /* End Halaman 1 */

        $this->pdf->Output();
    }

    public function suketPengantarKehilangan($idSurat, $nik, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($penduduk);
        // var_dump($detailSurat);
        /* Halaman 1 */
        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN PENGANTAR KEHILANGAN', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 145/   /403.406.07/2022', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Lurah Sukowinangun Kecamatan Magetan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(60, 0, 'Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */
        
        $this->pdf->Ln(4); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['jenis_kelamin'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['agama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['pekerjaan'], 0, 0, '');
        /* End Row */

        
        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'NIK', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, $penduduk['alamat'], 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(3); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Status Perkawinan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['status_pernikahan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Menerangkan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10,'Bahwa orang tersebut diatas benar-benar Penduduk', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Kelurahan Sukowinangun dan melaporkan telah kehilangan');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'kehilangan surat Akte Cerai atas namanya sendiri dan Akte');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Kelahiran anak GISELLA RAMADHANI PUTRI');
        /* End Row */

        $this->pdf->Ln(3); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Keperluan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10,'Surat keterangan ini diberikan kepada yang bersangkutan', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'untuk Pengantar Ke Polsek Magetan');

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Ln(8);
        $this->pdf->Cell(10, 15);
        $this->pdf->MultiCell(0, 10, 'Demikian surat ini di buat, dengan sebenar-benarnya dan mohon dapatnya', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(50, 0, 'dipergunakan sebagaimana mestinya.', 0, 0, '');
        /* End Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30, 10, '', 0, 0, 'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(45, 10, 'Magetan, ' . date('d M y'), 0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();

        /* End Halaman 1 */

        $this->pdf->Output();
    }

    public function suketPerwalian($idSurat, $nik, $penduduk)
    {
        $detailSurat = $this->getDetailSurat($idSurat);
        $detailSurat = json_decode($detailSurat['form_data']);
        // var_dump($penduduk);
        // var_dump($detailSurat);
        /* Halaman 1 */
        // Header
        $this->header2($this->pdf);

        $this->pdf->Cell(190, 0.5, '', 10, 0, '', true);
        $this->pdf->Ln(1);
        $this->pdf->Cell(190, 1.5, '', 10, 0, '', true);
        $this->pdf->Ln(6);

        $this->pdf->SetFont('Arial', 'U', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'SURAT KETERANGAN PERWALIAN', 0, 0, 'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'Nomor : 145/   /403.406.07/2022', 0, 0, 'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->MultiCell(0, 5, 'Yang bertanda tangan dibawah ini Kepala Kelurahan Sukowinangun Kecamatan', 0, 'L', '');
        $this->pdf->Ln(4);
        $this->pdf->Cell(60, 0, ' Magetan Kabupaten Magetan menerangkan dengan sebenarnya bahwa :', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(4); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Nama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Tempat, Tgl. Lahir', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['tempat_lahir'] . ', ' . $penduduk['tanggal_lahir'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Jenis Kelamin', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['jenis_kelamin'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Agama', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['agama'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Pekerjaan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['pekerjaan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 0);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'No. KTP', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['nik'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Status Perkawinan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(30, 10, $penduduk['status_pernikahan'], 0, 0, '');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Alamat', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10, $penduduk['alamat'], 0, 'L', '');
        /* End Row */
         /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10, 10);
        $this->pdf->Ln(2);
        $this->pdf->Cell(60, 10, 'Menerangkan', 0, 0, '');
        $this->pdf->Cell(10, 10, ':', 0, 0, 'C');
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->MultiCell(0, 10,'Bahwa nama tersebut diatas adalah benar-benar Penduduk', 0, 'L', '');
        $this->pdf->Ln(1);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(60,0, 'Kelurahan Sukowinangun Magetan dan akan menjadi Wali Nikah');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Adik Kandungan yang bernama RISA HERLINA menikah dengan');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Sdr VERI BAGUS SAPUTRA Bin Alm SAMSULI akan menikah');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'di Tumpang RT 001 RW 002 Desa Selappanggung Kec');
        $this->pdf->Ln(6);
        $this->pdf->Cell(70,10);
        $this->pdf->Cell(50,0, 'Ngariboyo Kab Magetan.');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(10,10);
        $this->pdf->Ln(2);
        $this->pdf->MultiCell(0, 5, 'Demikian untuk menjadikan maklum, mohon dapatnya dipergunakan sebagaimana mestinya.', 0, 'L', '');
        /* End Row */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(40, 10, 'Yang Bersangkutan', 0, 0, 'C');
        $this->pdf->Cell(50, 10);
        $this->pdf->Cell(70,10, 'Magetan,'.date('d M y'),0, 0, 'C');
        $this->pdf->Ln(8); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(47);
        $this->pdf->AddFont('Times New Roman', '', 'times.php'); //Regular
        $this->pdf->SetFont('Times New Roman', '', 12);
        $this->pdf->Cell(30, 10, 'LURAH SUKOWINANGUN', 0, 0, 'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial', 'UB', 12);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50, 10, '', 0, 0, 'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, 'SUCIPTO, S.Sos', 0, 0, 'C');
        $this->pdf->Ln(6); // new line
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(128);
        $this->pdf->Cell(40, 10, 'Penata Tk.l', 0, 0);
        $this->pdf->Ln(6);
        $this->pdf->Cell(112);
        $this->pdf->Cell(40, 10, 'NIP.19680423 199602 1 001', 0, 0);
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Ln(1); // new line
        $this->pdf->Cell(20, 10, '', 0, 0, '');
        $this->pdf->Cell(50);
        $this->pdf->Ln(1); // new line
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(18);
        $this->pdf->Cell(50,10,$penduduk['nama'],0, 0,'C');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial', 'UB', 10);
        $this->pdf->Cell(50, 10, $detailSurat->nama_penerima, 0, 0, 'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial', '', 10);
        /* End Row */

        $this->pdf->Output();

        /* End Halaman 1 */

        $this->pdf->Output();
    }
}
