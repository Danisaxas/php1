<?php
// Incluye la función callApi y otras funciones necesarias
include_once '../config/functions.php';  // Ajusta la ruta si es necesario

// Lógica para el comando /me
$welcomeMessage = "¡Hola! Bienvenido a tu cuenta.";

// Enviar el mensaje de bienvenida
callApi('sendMessage', [
    'chat_id' => $chat_id,
    'text' => $welcomeMessage,
    'parse_mode' => 'html',
    'reply_to_message_id' => $message_id,
]);
?>
