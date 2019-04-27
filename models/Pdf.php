<?php

require_once "../includes/fpdf/fpdf.php";
require_once '../models/Database.php';

class mypdf extends FPDF {

    private $db;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        parent::__construct($orientation, $unit, $size);
        $this->db = new Database();
    }

    /*function getdata() {
        $data = $this->db->getdata('persons ', ' ', 'WHERE `groupid` = 0 ');
        return $data;
    }
*/
    function headerTable() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(50, 10, 'ID', 1, 0, 'c');
        $this->Cell(50, 10, 'USER NAME', 1, 0, 'c');
        $this->Cell(60, 10, 'EMAIL', 1, 0, 'c');
        $this->ln();
    }

    function viewTable() {
        $this->SetFont('Arial', 'B', 16);
       /* $rows = $this->getdata();
        foreach ($rows as $row)
        {
*/
        $this->Cell(50, 10, $row['id'], 1, 0, 'c');
        $this->Cell(50, 10, $row['username'], 1, 0, 'c');
        $this->Cell(60, 10, $row['email'], 1, 0, 'c');
        $this->ln();
        
    }

}

/*
$pdf = new mypdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Output();
 * */

