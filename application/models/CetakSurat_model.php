<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        // $this->pdf->Cell(40,10,'_____________________',0,0,'');
        $this->pdf->Ln(4); // new line
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(25);
        $this->pdf->Cell(30,10,'Nip.',0,0,'');

        /* End Row */

        $this->pdf->Output();
    }

}