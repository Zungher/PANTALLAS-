<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, height=1920, initial-scale=1.0">
    <title>Información de Vuelos y Clima</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #1a1a2e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            width: 1080px;
            height: 1920px;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            overflow: hidden;
        }
        .top {
            flex: 2.8;
            background-color: #0f3460;
            padding: 10px;
            border-bottom: 5px solid #e94560;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .middle {
            flex: 1.5;
            background: #112d4e;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 5px solid #e94560;
        }
        .bottom {
            flex: 2.2;
            background: linear-gradient(to bottom, #16213e, #0f3460);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sección de vuelos -->
        <div class="top">
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
                echo "<p style='color: red; font-weight: bold;'>Error al obtener los datos de vuelos.</p>";
            } else {
                echo $contenido;
            }
            ?>
        </div>
        
        <!-- Sección del mapa -->
        <div class="middle">
            <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=-90.5250%2C14.5900%2C-90.5000%2C14.6050&layer=mapnik&marker=14.596977,-90.518358&line=-90.51913,14.59654;-90.52497,14.58249" scrolling="no" frameborder="0" allowfullscreen></iframe>
        </div>
        
        <!-- Sección del clima -->
        <div class="bottom">
            <iframe src="https://www.meteoblue.com/en/weather/widget/three/guatemala?geoloc=fixed&nocurrent=0&noforecast=0&days=4&tempunit=C&windunit=Kmh&layout=image" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
        </div>
    </div>
</body>
</html>
