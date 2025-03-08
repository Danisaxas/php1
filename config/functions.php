<?php
// config/functions.php

// Función para llamar a la API de Telegram
function callApi($method, $data = []) {
    // Definir el token de bot en config.php
    include_once 'config.php';
    
    // URL para hacer la solicitud a la API de Telegram
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/" . $method;

    // Configuración para la solicitud POST
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);

    // Realizar la solicitud y devolver el resultado
    return file_get_contents($url, false, $context);
}
?>
