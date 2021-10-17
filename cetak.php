<?php
require 'functions.php';

$buku = query("SELECT * FROM buku");

require_once("tcpdf/tcpdf.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Daftar Buku');
$pdf->SetTitle('Print Data');
$pdf->SetSubject('Daftar Buku');
$pdf->SetKeywords('Daftar Buku');
// file_get_contents("http://localhost/phpdasar/pertemuan21/pdf.php");

$pdf->SetFont('times', '', 14, '', true);
$pdf->AddPage();
$html=file_get_contents("http://localhost/phpdasar/pertemuan21/pdf.php");

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('DataBuku.pdf', 'I');
?>