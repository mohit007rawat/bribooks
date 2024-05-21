<?php
require_once('tcpdf/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = isset($_POST['title']) ? $_POST['title'] : array();
    $content = isset($_POST['content']) ? $_POST['content'] : array();
    $book_name = isset($_POST['book_name']) ? htmlspecialchars($_POST['book_name']) : '';
    $written_by = isset($_POST['written_by']) ? htmlspecialchars($_POST['written_by']) : '';

    function generatePDF($title, $content, $book_name, $written_by) {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Author Name');
        $pdf->SetTitle($book_name);
        $pdf->SetSubject('KDP Book');
        $pdf->SetKeywords('KDP, PDF, Book');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->AddPage();
        $pdf->Image('images/front_cover.jpg', 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('helvetica', 'B', 36);
        $pdf->SetXY(10, 50);
        $pdf->Cell(0, 0, $book_name, 0, 1, 'C', 0, '', 0);
        $pdf->SetFont('helvetica', 'I', 24);
        $pdf->SetXY($pdf->getPageWidth() - 100, $pdf->getPageHeight() - 30);
        $pdf->Cell(0, 0, 'Written by: ' . $written_by, 0, 1, 'R', 0, '', 0);

        for ($i = 0; $i < count($title); $i++) {
            $pdf->AddPage();
            ob_start();
            include 'templates/template.php';
            $html = ob_get_clean();
            $pdf->writeHTML($html, true, false, true, false, '');
        }

        $pdf->AddPage();
        $pdf->Image('images/back_cover.jpg', 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);

        ob_end_clean();
        $pdf->Output('kdp_book.pdf', 'I');
    }

    generatePDF($title, $content, $book_name, $written_by);
} else {
    echo "Invalid request.";
}
?>
