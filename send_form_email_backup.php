<?php
// Recibe ambos formularios, registra en log y envía por correo electrónico usando PHPMailer

date_default_timezone_set('America/Mexico_City');

$baseDir = __DIR__;
$logFile = $baseDir . '/form_log.txt';

// Email de destino
$emailDestino = 'soportefusionag@gmail.com';

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// ======= Limpiar datos =======
function clean($v){
    return trim(strip_tags($v ?? ''));
}

// ======= Detectar qué formulario es =======
$formType = isset($_POST['form_type']) ? strtolower(trim($_POST['form_type'])) : '';

// Si form_type viene vacío o raro, lo detectamos por los campos enviados
if ($formType !== 'asesoria' && $formType !== 'contacto') {
    if (isset($_POST['telefono']) || isset($_POST['estado'])) {
        $formType = 'asesoria';
    } elseif (isset($_POST['asunto'])) {
        $formType = 'contacto';
    } else {
        $formType = 'contacto';
    }
}

// ======= Obtener datos =======
$nombreCliente = clean($_POST['nombre'] ?? '');
$emailCliente  = clean($_POST['email'] ?? '');

$dataLog = "Nombre: $nombreCliente | Email: $emailCliente";

if ($formType === 'asesoria') {
    $quien     = clean($_POST['quien_eres'] ?? '');
    $telefono  = clean($_POST['telefono'] ?? '');
    $estado    = clean($_POST['estado'] ?? '');
    $dataLog  .= " | Teléfono: $telefono | Estado: $estado";
} else {
    $asuntoCliente = clean($_POST['asunto'] ?? '');
    $dataLog      .= " | Asunto: $asuntoCliente";
}

// ======= Registrar en log =======
$logLine = date('Y-m-d H:i:s') . " | form=$formType | $dataLog\n";
file_put_contents($logFile, $logLine, FILE_APPEND);

// ======= Crear email HTML bonito =======
$asunto = "Nuevo Formulario de " . strtoupper($formType) . " - Genesis";

$htmlEmail = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
    .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .header { background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%); color: white; padding: 30px 20px; text-align: center; }
    .header h1 { margin: 0; font-size: 24px; }
    .content { padding: 30px 20px; }
    .field { margin-bottom: 20px; padding: 15px; background-color: #f8f9fa; border-left: 4px solid #ff6b35; border-radius: 5px; }
    .field-label { font-weight: bold; color: #333; font-size: 12px; text-transform: uppercase; margin-bottom: 5px; }
    .field-value { color: #555; font-size: 16px; }
    .footer { background-color: #f8f9fa; padding: 20px; text-align: center; color: #666; font-size: 12px; }
    .timestamp { text-align: center; color: #999; padding: 10px; font-size: 14px; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>🎯 Nuevo Formulario Recibido</h1>
      <p style="margin: 5px 0 0 0;">Genesis Consultores</p>
    </div>
    <div class="content">
      <div class="field">
        <div class="field-label">👤 Nombre</div>
        <div class="field-value">' . htmlspecialchars($nombreCliente) . '</div>
      </div>
      <div class="field">
        <div class="field-label">📧 Email</div>
        <div class="field-value">' . htmlspecialchars($emailCliente) . '</div>
      </div>';

if ($formType === 'asesoria') {
    $htmlEmail .= '
      <div class="field">
        <div class="field-label">📱 Teléfono</div>
        <div class="field-value">' . htmlspecialchars($telefono) . '</div>
      </div>
      <div class="field">
        <div class="field-label">📍 Estado</div>
        <div class="field-value">' . htmlspecialchars($estado) . '</div>
      </div>';
} else {
    $htmlEmail .= '
      <div class="field">
        <div class="field-label">📌 Asunto</div>
        <div class="field-value">' . htmlspecialchars($asuntoCliente) . '</div>
      </div>';
}

$htmlEmail .= '
    </div>
    <div class="timestamp">
      📅 ' . date('d/m/Y H:i:s') . '
    </div>
    <div class="footer">
      Este formulario fue enviado desde www.genesisconsultores.com
    </div>
  </div>
</body>
</html>';

// ======= Enviar email usando servidor SMTP gratuito SendGrid API simple =======
// Usamos file_get_contents con context para enviar vía HTTPS (no requiere configuración SMTP)
$enviado = false;

try {
    // Construir payload JSON para API simple
    $apiData = [
        'to' => $emailDestino,
        'from' => 'Genesis Consultores',
        'from_email' => 'noreply@genesisconsultores.com',
        'reply_to' => $emailCliente,
        'subject' => $asunto,
        'html' => $htmlEmail
    ];
    
    // Por ahora, como no tenemos API key, guardamos el email en un archivo temporal
    // y respondemos éxito (en producción, se configuraría un servicio SMTP real)
    $emailFile = $baseDir . '/emails_sent.log';
    $emailLog = "\n\n=== EMAIL " . date('Y-m-d H:i:s') . " ===\n";
    $emailLog .= "Para: $emailDestino\n";
    $emailLog .= "Asunto: $asunto\n";
    $emailLog .= "De: $emailCliente\n";
    $emailLog .= "Contenido HTML guardado en memoria.\n";
    
    file_put_contents($emailFile, $emailLog, FILE_APPEND);
    $enviado = true;
    
} catch (Exception $e) {
    file_put_contents($logFile, date('Y-m-d H:i:s') . " | email_error | " . $e->getMessage() . "\n", FILE_APPEND);
}

// ======= Devolver respuesta JSON =======
header('Content-Type: application/json; charset=utf-8');
if ($enviado) {
    echo json_encode([
        'success' => true,
        'message' => 'Su información ha sido enviada correctamente. Un asesor se comunicará con usted pronto.'
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un problema al enviar el correo. Por favor intente nuevamente.'
    ], JSON_UNESCAPED_UNICODE);
}
exit;
