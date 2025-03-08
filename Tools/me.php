<?php
// Verificar si el archivo se cargó correctamente
if (!isset($chat_id)) {
    exit("No se recibió chat_id");
}

// Enviar el mensaje de bienvenida
$welcomeMessage = "¡Hola! Bienvenido a tu cuenta.";

// Enviar el mensaje
callApi('sendMessage', [
    'chat_id' => $chat_id,
    'text' => $welcomeMessage,
    'parse_mode' => 'html',
    'reply_to_message_id' => $message_id,
]);
?>
