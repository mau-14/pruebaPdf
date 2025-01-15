<?php
require_once '../fpdf186/fpdf.php';

// Verifica si se pasó el parámetro 'ranking'
if (isset($_GET['ranking'])) {
    // Recupera el JSON de la URL y decodifícalo
    $ranking = json_decode(urldecode($_GET['ranking']), true);

    // Crear el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Escribir el título
    $pdf->Cell(0, 10, 'Ranking', 0, 1, 'C');
    $pdf->Ln(10);

   $pdf->Cell(40, 10, 'Posicion', 1, 0, 'C');  
    $pdf->Cell(90, 10, 'Nombre', 1, 0, 'C');     
    $pdf->Cell(40, 10, 'Puntuacion', 1, 1, 'C'); 
    $pdf->SetFont('Arial', '', 12);

    // Crear la tabla de rankings
    foreach ($ranking as $index => $fila) {
        $pdf->Cell(40, 10, ($index + 1), 1);
        $pdf->Cell(90, 10, $fila['nickname'], 1);
        $pdf->Cell(40, 10, $fila['puntuacion'], 1);
        $pdf->Ln();
    }

    // Mostrar el PDF
    $pdf->Output();
} else {
    echo "No se encontraron datos para generar el PDF.";
}
