<?php
// Tools/me.php

// Función que obtiene el idioma del usuario desde la base de datos (simulada aquí)
$lang = 'es'; // En una implementación real, esto se obtendría desde una base de datos.

// Cargar los mensajes de idioma
$messages = loadLanguage($lang);

// Obtener la información del usuario (esto es solo un ejemplo)
$accountMessage = "Información de tu cuenta:\nNombre: Juan Pérez\nID: $userId";

// Enviar el mensaje con la información del usuario
sendMessage($chatId, $accountMessage);
sendMessage($chatId, "Botón de acción:", $messages['button_tap']);

// Función para cargar los mensajes de idioma
function loadLanguage($lang) {
    $messages = [
        'es' => [
            'button_tap' => 'Toca aquí'
        ],
        'en' => [
            'button_tap' => 'Tap here'
        ]
    ];

    return $messages[$lang] ?? $messages['es']; // Default to Spanish
}
?>
