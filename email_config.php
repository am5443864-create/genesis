<?php
// Configuración SMTP para envío de emails
// IMPORTANTE: Para Gmail, necesitas:
// 1. Habilitar verificación en 2 pasos
// 2. Generar una "Contraseña de aplicación" en https://myaccount.google.com/apppasswords
// 3. Usar esa contraseña aquí (no tu contraseña normal de Gmail)

return [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => 'soportefusionag@gmail.com',  // Tu email de Gmail
    'smtp_pass' => 'rrix vlys uuua pdeu',  // Tu App Password de Gmail
    'from_email' => 'soportefusionag@gmail.com',
    'from_name' => 'Genesis Consultores',
    'to_email' => 'soportefusionag@gmail.com',
];
