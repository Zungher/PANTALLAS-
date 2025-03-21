<?php
// URL del sitio de vuelos
$url = "http://salidas.dgac.gob.gt/vuelos/pantallas/salidas.php";

// Configura la solicitud HTTP
$options = array(
    "http" => array(
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
    )
);

// Crea el contexto de la solicitud
$context = stream_context_create($options);

// Obtiene el contenido de la página
$contenido = file_get_contents($url, false, $context);

// Verifica si se pudo obtener el contenido
if ($contenido === false) {
    http_response_code(500);
    echo "Error al obtener los datos de vuelos.";
    exit;
}

// Establece los encabezados correctos
header("Content-Type: text/html; charset=UTF-8");
echo $contenido;
?>
