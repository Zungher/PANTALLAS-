<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

// Obtener la página de vuelos y mostrarla
$url = "http://salidas.dgac.gob.gt/vuelos/pantallas/salidas.php";
$contenido = file_get_contents($url);
if ($contenido !== false) {
    echo $contenido;
} else {
    echo "<h2 style='color:red; text-align:center;'>Error al obtener datos de vuelos.</h2>";
}
?>
