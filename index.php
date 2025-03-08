<?php
// Incluye el archivo de configuración
include_once 'config/config.php';

// Función para llamar a la API de Telegram
function callApi($method, $data = []) {
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/" . $method;
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

// Procesar mensajes entrantes
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (isset($update['message'])) {
    $message = $update['message'];
    $chat_id = $message['chat']['id'];
    $message_id = $message['message_id'];
    $userId = $message['from']['id'];
    $text = $message['text'] ?? '';

    // Detectar el comando /me
    if (preg_match('/^[\/\.,\$](me)(?:\s+(.+))?$/i', $text, $matches)) {
        // Cargar el archivo que maneja el comando '/me'
        include_once 'Tools/me.php';
    } else {
        // Responder si no se encuentra el comando
        callApi('sendMessage', [
            'chat_id' => $chat_id,
            'text' => 'Comando no reconocido.',
        ]);
    }
}
?>
