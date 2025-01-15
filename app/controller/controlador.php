<?php 


require_once '../model/modelo.php';

$modelo = new Modelo();
$ranking = $modelo->obtenerRanking();

// Convertir el array a JSON
$rankingJson = urlencode(json_encode($ranking));

$html = '<h1>Ranking</h1>';
$html .= '<table border="1" width="50%">';
$html .= '<thead><tr><th>Nombre</th><th>Puntuacion</th></tr></thead>';
$html .= '<tbody>';

foreach ($ranking as $fila) {
    $html .= '<tr>';
    $html .= '<td>' . $fila['nickname'] . '</td>';
    $html .= '<td>' . $fila['puntuacion'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>
          <br/>
          <br/>
          <button id="miBoton">Ver Pdf</button>';

$html .= '<script>
            document.getElementById("miBoton").onclick = function() {
              // Redirigir a pdf.php con el array en la URL
              window.location.href = "../pdf.php?ranking=' . $rankingJson . '";
            };
          </script>';

echo $html;
