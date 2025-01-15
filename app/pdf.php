<?php
require_once '../fpdf/fpdf.php';

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

    // Crear la tabla de rankings
    foreach ($ranking as $index => $fila) {
        $pdf->Cell(40, 10, 'Posicion: ' . ($index + 1), 1);
        $pdf->Cell(90, 10, 'Nombre: ' . $fila['nickname'], 1);
        $pdf->Cell(40, 10, 'Puntuacion: ' . $fila['puntuacion'], 1);
        $pdf->Ln();
    }

    // Mostrar el PDF
    $pdf->Output();
} else {
    echo "No se encontraron datos para generar el PDF.";
}
?>
