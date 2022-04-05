<?php
require(APPPATH.'third_party/fpdf/fpdf.php');

class pdf extends FPDF {
    // function __construct() {
    //     include_once APPPATH . '/third_party/fpdf/fpdf.php';
    // }
    // Page header
    function Header()
    {
        // // Logo
        // $this->Image('assets/img/madiun.gif',10,6,30);
        // // Arial bold 15
        // $this->SetFont('Arial','B',15);
        // // Move to the right
        // $this->Cell(80);
        // // Title
        // $this->SetFont('Arial','',10);
        // $this->Cell(30,10,'PEMERINTAH KABUPATEN MADIUN',0,0,'C');
        // // Line break
        // $this->Ln(6);
        // $this->Cell(80);
        // $this->Cell(30,10,'KECAMATAN KEBONSARI',0,0,'C');
        // $this->Ln(6);
        // $this->Cell(80);
        // $this->SetFont('Arial','B',15);
        // $this->Cell(30,10,'DESA SIDOREJO',0,0,'C');
        // $this->Ln(6);
        // $this->Cell(80);
        // $this->SetFont('Arial','',10);
        // $this->Cell(30,10,'Jl. Dr. Soetomo RT. 017 RW. 008',0,0,'C');
        // $this->Ln(6);
        // $this->Cell(80);
        // $this->SetFont('Arial','U',10);
        // $this->Cell(30,10,'SIDOREJO 63173',0,0,'C');
        // $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
?>