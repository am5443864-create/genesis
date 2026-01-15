<?php
// Recibe ambos formularios, registra en log y envía por correo electrónico usando PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

date_default_timezone_set('America/Mexico_City');

$baseDir = __DIR__;
$logFile = $baseDir . '/form_log.txt';

// Configuración de SMTP y correo de destino
$emailConfig = [];
if (file_exists($baseDir . '/email_config.php')) {
  $emailConfig = include $baseDir . '/email_config.php';
}

$emailDestino = $emailConfig['to_email'] ?? 'soportefusionag@gmail.com';

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

// ======= Construir mensaje para WhatsApp =======
$whatsappMsg = "*Nuevo formulario de " . strtoupper($formType) . "*\n\n";
$whatsappMsg .= "👤 Nombre: $nombreCliente\n";
$whatsappMsg .= "📧 Email: $emailCliente\n";

if ($formType === 'asesoria') {
    $whatsappMsg .= "📱 Teléfono: $telefono\n";
    $whatsappMsg .= "📍 Estado: $estado\n";
} else {
    $whatsappMsg .= "📌 Asunto: $asuntoCliente\n";
}

$whatsappMsg .= "\n📅 Fecha: " . date('d/m/Y H:i:s') . "\n";

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

// ======= Enviar email usando PHPMailer =======
$enviado = false;

try {
  // Validar configuración mínima
  if (empty($emailConfig['smtp_user']) || empty($emailConfig['smtp_pass'])) {
    throw new Exception('Faltan credenciales SMTP en email_config.php');
  }

  $mail = new PHPMailer(true);

  // Config SMTP
  $mail->isSMTP();
  $mail->Host       = $emailConfig['smtp_host'] ?? 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = $emailConfig['smtp_user'];
  $mail->Password   = $emailConfig['smtp_pass'];
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = $emailConfig['smtp_port'] ?? 587;
  $mail->CharSet    = 'UTF-8';

  // Remitente y destinatario
  $mail->setFrom($emailConfig['from_email'] ?? 'noreply@genesisconsultores.com', $emailConfig['from_name'] ?? 'Genesis Consultores');
  $mail->addAddress($emailDestino);
  if (!empty($emailCliente)) {
    $mail->addReplyTo($emailCliente, $nombreCliente ?: $emailCliente);
  }

  // Contenido
  $mail->isHTML(true);
  $mail->Subject = $asunto;
  $mail->Body    = $htmlEmail;
  $mail->AltBody = strip_tags($htmlEmail);

  $mail->send();
  $enviado = true;
  file_put_contents($logFile, date('Y-m-d H:i:s') . " | email_sent | Email enviado vía SMTP\n", FILE_APPEND);

} catch (Exception $e) {
  $errorMsg = "Error al enviar: " . $e->getMessage();
  file_put_contents($logFile, date('Y-m-d H:i:s') . " | email_error | $errorMsg\n", FILE_APPEND);
  $enviado = false;
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

