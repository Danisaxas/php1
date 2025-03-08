<?php
// index.php

// Cargar la configuración del bot
require_once 'config/config.php';

// Obtener los datos del mensaje recibido
$update = json_decode(file_get_contents('php://input'), true);
$message = $update['message'] ?? null;
$userId = $message['from']['id'] ?? null;
$chatId = $message['chat']['id'] ?? null;
$messageId = $message['message_id'] ?? null;
$text = $message['text'] ?? '';

// Verificar si hay un comando
if (preg_match('/^[\/\.,\$](?:me)(?:\s+(.+))?$/i', $text, $matches)) {
    include 'Tools/me.php';
} else {
    // Responder con un mensaje por defecto
    sendMessage($chatId, "Comando no reconocido.");
}

// Función para enviar un mensaje
function sendMessage($chatId, $text) {
    global $token;

    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'HTML'
    ];
    
    file_get_contents($url . '?' . http_build_query($data));
}
?>
