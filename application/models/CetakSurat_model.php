<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

class CetakSurat_model extends CI_Model {

    private $pdf;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $this->pdf = new pdf('P', 'mm','A4');
        $this->pdf->AddPage();
    }

    private function header() {
        // Logo
        $this->pdf->Image('assets/img/madiun.gif',10,6,30);
        // Arial bold 15
        $this->pdf->SetFont('Arial','B',15);
        // Move to the right
        $this->pdf->Cell(80);
        // Title
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30,10,'PEMERINTAH KABUPATEN MADIUN',0,0,'C');
        // Line break
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'KECAMATAN KEBONSARI',0,0,'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial','B',15);
        $this->pdf->Cell(30,10,'DESA SIDOREJO',0,0,'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30,10,'Jl. Dr. Soetomo RT. 017 RW. 008',0,0,'C');
        $this->pdf->Ln(6);
        $this->pdf->Cell(80);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(30,10,'SIDOREJO 63173',0,0,'C');
        $this->pdf->Ln(20);
    }
    
    public function printFromView($html, $totalPage)
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4', 'orientation' => 'P']);
        
        for ($i=0; $i < $totalPage; $i++) { 
            $mpdf->WriteHTML($html[$i]);
            if(($i+1) < $totalPage)
                $mpdf->AddPage();
        }
        $mpdf->Output();
    }

    public function suratUsaha($data)
    {
        // Header
        $this->header($this->pdf);

        $this->pdf->SetFont('Arial','U',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'SURAT KETERANGAN USAHA',0,0,'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'Nomor : 471.21 / 219 / 402.315. 10 / 2019',0,0,'C');

        $this->pdf->Ln(15); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'I. Yang bertanda tangan di bawah ini :',0,0,'');
        $this->pdf->Ln(6);
        $this->pdf->Cell(10);
        /* Start Child Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'a. Nama Lengkap',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);

        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'b. Jabatan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'');
        /* End Child Row */
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(3);
        $this->pdf->Cell(60,10,'Dengan ini menerangkan bahwa :',0,0,'');
        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'a. Nama',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'b. Tempat, Tanggal Lahir',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kendal, 03 Agustus 1981',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'c. Jenis Kelamin',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Perempuan',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'d. Pekerjaan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Mengurus rumah tangga',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'e. Agama',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Islam',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'f. Status Perkawinan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kawin',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'g. Nomor KTP',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'3519014308810003',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'h. Alamat',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->MultiCell(0,10,'RT. 13 RW. 05 Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun',0,['L','B'],'');
        /* End Child Row */
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10, 10, 'II. ', 0, 0, 'L');
        $this->pdf->Ln(2.6);
        $this->pdf->Cell(5);
        $this->pdf->MultiCell(0,5,'Orang tersebut di atas benar-benar penduduk Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun dan benar-benar memiliki usaha dibidang Jahit-menjahit.',0,'L','');
        $this->pdf->Ln(4);
        /* End Row */
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10, 10, 'III. ', 0, 0);
        $this->pdf->Ln(2.6);
        $this->pdf->Cell(10);
        $this->pdf->MultiCell(0,5,'Surat keterangan ini dipergunakan untuk : Pengambilan BPUM  di BANK BRI',0,'L','');
        $this->pdf->Ln(4);
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10);
        $this->pdf->Cell(0,5,'Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.',0,'L','');
        /* Start Child Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30,10,'',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50,10,'Tanda tangan yang berhak',0,0,'L');
        $this->pdf->Cell(47);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50,10,'INAYATUS SOLEHKHAH',0,0,'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(40,10,'ANA SETYAWATI',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        /* End Row */

        $this->pdf->Output();
    }

    public function suratKuasa($data)
    {
        // Header
        // $this->header($this->pdf);

        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'SURAT KUASA',0,0,'C');

        $this->pdf->Ln(15); // new line

        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30,10,'Yang bertanda tangan di bawah ini :',0,0,'C');

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Nama Lengkap',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'No. KTP',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'3511182612000001',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Tempat Tgl. lahir',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(50,10,'Madiun, 08 Agustus 1999,',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Umur',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(50,10,'20 tahun',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Pekerjaan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Guru',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Alamat',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'RT. 14 RW. 07 Ds.Sidorejo Kec. Kebonsari Kab. Madiun',0,0,'');
        /* End Row */

        $this->pdf->Ln(12); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Dengan ini memberi kuasa kepada : ',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        /* End Row */

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Nama',0,0,'');
        $this->pdf->Cell(10,10,':',0,'B','C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'SITI ASIYAH',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'No. KTP',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'3511182612000002',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Tempat, Tgl. Lahir',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Magetan, 03-05-1960',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Umur',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(50,10,'20 tahun',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Pekerjaan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Guru',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Alamat',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'RT. 14 RW. 07 Ds.Sidorejo Kec. Kebonsari Kab. Madiun',0,0,'');
        /* End Row */

        $this->pdf->Ln(10); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'Untuk Mengambil Kartu Tani',0,0,'');;
        /* End Row */

        $this->pdf->Ln(12); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10);
        $this->pdf->Cell(60,10,'Demikian surat kuasa ini dibuat untuk dipergunakan sebagaimana mestinya.',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        /* End Row */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30,10,'',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(26);
        $this->pdf->Cell(50,10,'Penerima Kuasa',0,0,'L');
        $this->pdf->Cell(45);
        $this->pdf->Cell(30,10,'Pemberi Kuasa',0,0,'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(28);
        $this->pdf->Cell(50,10,'SITI ASIYAH',0,0,'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(40,10,'DRS. MOH. MAKSUM',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        /* End Row */

        $this->pdf->Ln(10);

        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(0,10,'Mengetahui,',0,0,'C');
        $this->pdf->Ln(4);
        $this->pdf->Cell(0,10,'Kepala Desa Sidorejo',0,0,'C');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(0,10,'ANA SETYAWATI',0,0,'C');


        $this->pdf->Output();
    }

    public function suratTidakMampu($data)
    {
        // Header
        $this->header($this->pdf);

        $this->pdf->SetFont('Arial','U',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'SURAT KETERANGAN TIDAK MAMPU',0,0,'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'Nomor : 471.21 / 219 / 402.315. 10 / 2019',0,0,'C');

        $this->pdf->Ln(15); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'I. Yang bertanda tangan di bawah ini :',0,0,'');
        $this->pdf->Ln(6);
        $this->pdf->Cell(10);
        /* Start Child Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'a. Nama Lengkap',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);

        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'b. Jabatan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'');
        /* End Child Row */
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(3);
        $this->pdf->Cell(60,10,'Dengan ini menerangkan bahwa :',0,0,'');
        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'a. Nama',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'b. Tempat, Tanggal Lahir',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kendal, 03 Agustus 1981',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'c. Jenis Kelamin',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Perempuan',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'d. Pekerjaan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Mengurus rumah tangga',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'e. Agama',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Islam',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'f. Status Perkawinan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kawin',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'g. Nomor KTP',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'3519014308810003',0,0,'');
        /* End Child Row */

        $this->pdf->Ln(6);
        /* Start Child Row */
        $this->pdf->Cell(10);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'h. Alamat',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->MultiCell(0,10,'RT. 13 RW. 05 Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun',0,['L','B'],'');
        /* End Child Row */
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10, 10, 'II. ', 0, 0, 'L');
        $this->pdf->Ln(2.6);
        $this->pdf->Cell(5);
        $this->pdf->MultiCell(0,5,'Orang tersebut di atas benar-benar penduduk Desa Sidorejo Kecamatan Kebonsari Kabupaten Madiun. Keadaan sosial ekonomi orang tersebut di atas benar-benar TIDAK MAMPU dan benar-benar tidak mempunyai jaminan    kesehatan berupa apapun',0,'L','');
        $this->pdf->Ln(4);
        /* End Row */
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10, 10, 'III. ', 0, 0);
        $this->pdf->Ln(2.6);
        $this->pdf->Cell(10);
        $this->pdf->MultiCell(0,5,'Surat keterangan ini dipergunakan untuk Persyaratan mengurus JAMPERSAL',0,'L','');
        $this->pdf->Ln(4);
        /* End Row */

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10);
        $this->pdf->Cell(0,5,'Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.',0,'L','');
        /* Start Child Row */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30,10,'',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(20);
        $this->pdf->Cell(50,10,'Tanda tangan yang berhak',0,0,'L');
        $this->pdf->Cell(47);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'L');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(50,10,'INAYATUS SOLEHKHAH',0,0,'L');
        $this->pdf->Cell(45);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(40,10,'ANA SETYAWATI',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        /* End Row */

        $this->pdf->Output();
    }

    public function suratPindah($data)
    {
        /* Halaman 1 */
        // Header
        $this->header($this->pdf);

        $this->pdf->SetFont('Arial','U',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'SURAT KETERANGAN PINDAH TEMPAT',0,0,'C');

        $this->pdf->Ln(6); // new line

        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30,10,'Nomor : 471.21 / 219 / 402.315. 10 / 2019',0,0,'C');

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'1. Nama Lengkap',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'NUR CAHYONO',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'2. Jenis kelamin',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Laki-laki',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'3. Tempat Tgl. lahir',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(50,10,'Madiun, 08 Agustus 1999,',0,0,'');
        $this->pdf->Cell(4);
        $this->pdf->Cell(30,10,'Umur : 20 tahun',0,1,'');
        /* End Row */

        // $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'4. Kewarganegaraan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'WNI',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'5. Agama',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Islam',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'6. Status Pernikahan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Belum Kawin',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'7. Pekerjaan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Belum Pelajar/Mahasiswa',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'8. Pendidikan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'TAMAT SD/SEDERAJAT',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'9. Alamat Asal',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'RT. 16 RW. 08 Desa Sidorejo Kecamatan Kebonsari',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'10. Nomor Induk Kependudukan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10, '3511192812000001',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'11. Pindah ke',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'JL. M. ISWAHYUDI RT. 02 RW. 00',0,0,'');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70,);
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kelurahan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->Cell(30,10,'RINDING',0,0,'');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70,);
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kecamatan',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->Cell(30,10,'TELUK BAYUR',0,0,'');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70,);
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Kabupaten/Kota',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->Cell(30,10,'BERAU',0,0,'');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70,);
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Provinsi',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->Cell(30,10,'KALIMANTAN TIMUR',0,0,'');
        /* End Row */

        $this->pdf->Ln(6); // new line

        /* Start Row */
        $this->pdf->Cell(70,);
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'Pada Tanggal',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->Cell(30,10,'30 Desember 2019',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'12. Alasan Pindah',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'PEKERJAAN',0,0,'');
        /* End Row */

        $this->pdf->Ln(8); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(60,10,'13. Pengikut',0,0,'');
        $this->pdf->Cell(10,10,':',0,0,'C');
        $this->pdf->SetFont('Arial','',12);
        $this->pdf->Cell(30,10,'- Orang',0,0,'');
        /* End Row */

        /* Table */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10,20,'No.','L:1, T:1, B:1',0,'');
        $this->pdf->Cell(30,20,'Nama',1,0,'C');
        // $this->pdf->MultiCell(8,10,'JKL/P',1,'C');
        $this->pdf->Cell(8,20,'L/P','T:1, B:1','C');
        $this->pdf->Cell(15,20,'Umur',1,0,'C');
        $this->pdf->Cell(30,20,'Status Perkawinan','T:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'Pendidikan',1,0,'C');
        $this->pdf->Cell(30,20,'No. KTP','T:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'Keterangan',1,0,'C');
        /* End Row */

        $this->pdf->Ln(20); // new line

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10,20,'','L:1, B:1',0,'');
        $this->pdf->Cell(30,20,'','L:1, B:1',0,'C');
        $this->pdf->Cell(8,20,'','L:1, B:1','C');
        $this->pdf->Cell(15,20,'','L:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'','L:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'','L:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'','L:1, B:1',0,'C');
        $this->pdf->Cell(30,20,'','L:1, B:1, R:1',0,'C');
        /* End Row */

        /* End Table */

        $this->pdf->Ln(32); // new line
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(30,10,'Mengetahui,',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30,10,'Camat Kebonsari',0,0,'');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'C');
        $this->pdf->Ln(30); // new line
        $this->pdf->SetFont('Arial','U',10);
        $this->pdf->Cell(25);
        $this->pdf->Cell(40,10,'_____________________',0,0,'');
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(40,10,'ANA SETYAWATI',0,0,'C');

        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(25);
        $this->pdf->Cell(30,10,'Nip.',0,0,'');

        /* End Row */
        /* End Halaman 1 */
        
        /* Halaman 2 */
        $this->pdf->AddPage();
        
        /* Start Header */
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(90);
        $this->pdf->Cell(20,10,'F. 1-06',1,0,'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(0,10,'SURAT KETERANGAN PINDAH-DATANG WNI',0,0,'C');
        /* End Header */

        $this->pdf->Ln(8);

        /* Start Row */
        $this->pdf->SetFont('Arial','B',13);
        $this->pdf->Cell(30,10,'DATA DAERAH ASAL',0,0,'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '2. Nama Kepala Keluarga', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'SUJITO', 1, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(10);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '3. Alamat', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1,0, 'C');
        $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1,0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // $this->pdf->Cell(10);
        $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(59);
        $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        $this->pdf->Cell(7);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(6, 8, '6', 1,0, 'C');
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
        $this->pdf->SetFont('Arial','B',13);
        $this->pdf->Cell(30,10,'DATA KEPINDAHAN',0,0,'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '1. Alasan Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, 'PEKERJAAN', 1, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '2. Alamat Tujuan Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(50, 8, '', 1, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(10, 8, 'RT.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1,0, 'C');
        $this->pdf->Cell(8, 8, '1', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '6', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(10, 8, 'RW.', 0, 0, 'L');
        $this->pdf->Cell(8, 8, '0', 1,0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(8, 8, '8', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Ln(10);
        $this->pdf->Cell(60);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(45, 8, 'Dusun/Dukuh/Kampung', 0, 0, 'L');
        // $this->pdf->Cell(10);
        $this->pdf->Cell(0, 8, '', 1, 0, 'L');
        /* End Row */

        $this->pdf->Ln(10);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(59);
        $this->pdf->Cell(14, 8, 'Kode Pos', 0, 0, 'L');
        $this->pdf->Cell(7);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(6, 8, '6', 1,0, 'C');
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
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '3. Klasifikasi Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'Antar Kabupaten/Kota atau Antar Provinsi', 1, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(10);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '4. Jenis Kepindahan', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(0, 8, 'Kepala Keluarga', 1, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(10);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(22, 5, '5. Status Nomor KK', 0, 0, 'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(8, 8, '8', 1, 0, 'C');
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(22, 5, '6. Status Nomor KK', 0, 0, 'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(8, 8, '-', 1, 0, 'C');
        $this->pdf->SetFont('Arial','',10);
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
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30, 8, '7. Rencana Tgl. Pindah', 0, 0, 'L');
        $this->pdf->Cell(30);
        $this->pdf->Cell(8, 8, '3', 1,0, 'C');
        $this->pdf->Cell(8, 8, '0', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(8, 8, '1', 1,0, 'C');
        $this->pdf->Cell(8, 8, '2', 'T:1, B:1, R:1', 0, 'C');
        $this->pdf->Cell(7);
        $this->pdf->Cell(8, 8, '2', 1,0, 'C');
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
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(30,10,'Diketahui Oleh : ,',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30,10,'Camat',0,0,'');
        $this->pdf->Cell(62);
        $this->pdf->Cell(30,10,'Kepala Desa Sidorejo',0,0,'');
        $this->pdf->Ln(5); // new line
        $this->pdf->Cell(30);
        $this->pdf->Cell(30,10,'No ............................, Tgl',0,0,'');
        $this->pdf->Cell(62);
        $this->pdf->Cell(30,10,'No ............................, Tgl',0,0,'');
        $this->pdf->Ln(13); // new line
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(30);
        $this->pdf->Cell(40,10,'......................................................',0,0,'');
        $this->pdf->Cell(52);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(40,10,'......................................................',0,0,'');
        /* End Row */
        /* End Halaman 2 */

        /* Halaman 3 */
        $this->pdf->AddPage();
        
        /* Start Header */
        $this->pdf->SetFont('Arial','B',14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(90);
        $this->pdf->Cell(20,10,'F. 1-07',1,0,'C');
        $this->pdf->Ln(4);
        $this->pdf->SetFont('Arial','',12);
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
        $this->pdf->Image('assets/img/pancasila.png',95,28,16);
        $this->pdf->Ln(28);
        $this->pdf->SetFont('Arial','BU',14);
        $this->pdf->Cell(0,10,'BIODATA PENDUDUK WARGA NEGARA INDONESIA',0,0,'C');
        /* End Header */

        $this->pdf->Ln(10);

        /* Start Row */
        $this->pdf->SetFont('Arial','B',13);
        $this->pdf->Cell(30,10,'DATA PERSONAL',0,0,'L');
        $this->pdf->Ln(6);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '1.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Lengkap', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'NUR CAHYONO', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(5);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '2.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tempat Lahir', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'MADIUN', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '3.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Lahir', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '08-08-1999', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '4.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Jenis Kelamin', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'LAKI-LAKI', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '5.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Golongan Darah', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '6.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Agama', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'ISLAM', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '7.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Pendidikan Akhir', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'TAMAT SD/SEDERAJAT', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '8.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Pekerjaan', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'PELAJAR/MAHASISWA', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '9.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Penyandang Cacat', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '10.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Status Perkawinan', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'BELUM KAWIN', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '11.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Status Hubungan Dalam Keluarga', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'ANAK', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '12.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'NIK Ibu', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519017112770033', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '13.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Ibu', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'RUSLINA', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '14.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'NIK Ayah', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519013112650089', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '15.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nama Ayah', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, 'SUJITO', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '16.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Alamat Sebelumnya', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->MultiCell(70, 8, 'RT. 16 RW. 08', 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);
        
        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '17.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Alamat Sekarang', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->MultiCell(70, 8, 'RT. 16 RW. 08', 0, 'L');
        /* End Row */
        
        // $this->pdf->Ln(2);

        /* Start Row */
        $this->pdf->SetFont('Arial','B',13);
        $this->pdf->Cell(30,10,'DATA KEPEMILIKAN DOKUMEN',0,0,'L');
        $this->pdf->Ln(6);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '18.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Kartu Keluarga (No. KK)', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '3519012401980452', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '19.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Paspor', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '20.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Berakhir Paspor', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '21.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta/Surat Kenal Lahir', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '03287/UM/066/1999', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '22.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta Perkawinan/Buku Nikah', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '23.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Perkawinan', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '24.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Nomor Akta Perceraian/Surat Cerai', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */
        
        $this->pdf->Ln(6);

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(5, 8, '25.', 0, 0, 'L');
        $this->pdf->Cell(5);
        $this->pdf->Cell(20, 8, 'Tanggal Perceraian', 0,0, 'L');
        $this->pdf->Cell(50);
        $this->pdf->Cell(5, 8, ':', 0, 0, 'C');
        $this->pdf->Cell(0, 8, '-', 0, 0, 'L');
        /* End Row */

        $this->pdf->Ln(6); // new line

        $this->pdf->AddPage();

        /* Start Row */
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20);
        $this->pdf->Cell(30,10,'',0,0,'C');
        $this->pdf->Cell(70);
        $this->pdf->Cell(30,10,'Sidorejo, 30 Desember 2019',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->Cell(26);
        $this->pdf->Cell(50,10,'Penerima Kuasa',0,0,'L');
        $this->pdf->Cell(45);
        $this->pdf->Cell(30,10,'Pemberi Kuasa',0,0,'L');
        $this->pdf->Ln(15); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(28);
        $this->pdf->Cell(50,10,'SITI ASIYAH',0,0,'L');
        $this->pdf->Cell(38);
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(40,10,'DRS. MOH. MAKSUM',0,0,'C');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        /* End Row */

        $this->pdf->Ln(5);

        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(0,10,'Mengetahui,',0,0,'C');
        $this->pdf->Ln(4);
        $this->pdf->Cell(0,10,'Kepala Desa Sidorejo',0,0,'C');
        $this->pdf->Ln(15); // new line
        $this->pdf->SetFont('Arial','UB',10);
        $this->pdf->Cell(0,10,'ANA SETYAWATI',0,0,'C');
        
        /* End Halaman 3 */

        $this->pdf->Output();
    }

}