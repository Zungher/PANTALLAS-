<?php
// URL del sitio de vuelos
$url = "http://salidas.dgac.gob.gt/vuelos/pantallas/salidas.php";

// Obtiene el contenido de la página
$contenido = file_get_contents($url);

// Establece los encabezados correctos
header("Content-Type: text/html; charset=UTF-8");
echo $contenido;
?>
