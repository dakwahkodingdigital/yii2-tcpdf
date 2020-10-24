<?php

namespace dakwahkodingdigital\yii2tcpdf;

require_once(dirname(__FILE__) . '/tcpdf/tcpdf.php');

/**
 * This is just an example.
 */
class YiiTCPDF extends \TCPDF {

    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    public $headerLogo;
    public $headerTitle;
    public $headerSubTitle;
    public $footerTitle;
    public $footerDisableNumber = false;

    public function Header() {
        $this->Image($this->headerLogo, 15, 10, 8, '', '', '', 'T', false, 100, '', false, false, 0, false, false, false);
        $this->SetFont('times', 'B', 14);
        $this->Ln(2);
        $this->setCellMargins(10);
        $this->Cell(0, 5, $this->headerTitle, 0, true, 'L', 0, '', 0, false, 'M', 'M');
        $this->Ln(2);
        $this->SetFont('times', 'B', 12);
        $this->Cell(0, 5, $this->headerSubTitle, 0, true, 'L', 0, '', 0, false, 'M', 'M');
        $this->setCellMargins(0);
        $this->SetFont('times', 'B', 2);
        $this->Cell(0, 0, '', 'B', true, 'L', 0, '', 0, false, 'M', 'M');
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        if ($this->footerDisableNumber == true) {
            $this->Cell(0, 10, $this->footerTitle, 0, false, 'R', 0, '', 0, false, 'T', 'M');
        } else {
            $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

}
