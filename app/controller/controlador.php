<?php 


require_once '../model/modelo.php';

$modelo = new Modelo();

$ranking = $modelo->obtenerRanking();

$html = '<h1>Ranking</h1>';
$html .= '<table border="1" width="50%">';
$html .= '<thead><tr><th>Nombre</th><th>Puntuacion</th>></tr></thead>';
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
              window.location.href = "../pdf.php"
            };
        </script>';


echo $html;
