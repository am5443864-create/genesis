<?php
// Quick test sender for WhatsApp Cloud API
// Visit in browser: http://localhost/Genesis/test_whatsapp.php
// Optional GET overrides: ?token=...&phone_id=...&to=...
// If not provided, it uses values from config.php or environment.

date_default_timezone_set('America/Mexico_City');
$baseDir = __DIR__;

header('Content-Type: application/json; charset=utf-8');

// Check cURL
if (!function_exists('curl_init')) {
    echo json_encode(['success' => false, 'message' => 'PHP cURL no está habilitado. Habilite php_curl en php.ini.']);
    exit;
}

// Load config
$cfg = [];
if (file_exists($baseDir . '/config.php')) {
    $tmp = include $baseDir . '/config.php';
    if (is_array($tmp)) $cfg = $tmp;
}

$token   = $_GET['token']    ?? ($cfg['WHATSAPP_TOKEN']        ?? getenv('WHATSAPP_TOKEN')        ?: '');
$phoneId = $_GET['phone_id'] ?? ($cfg['WHATSAPP_PHONE_ID']     ?? getenv('WHATSAPP_PHONE_ID')     ?: '');
$to      = $_GET['to']       ?? ($cfg['WHATSAPP_RECIPIENT']    ?? getenv('WHATSAPP_RECIPIENT')    ?: '');
$cc      = $cfg['WHATSAPP_COUNTRY_CODE'] ?? getenv('WHATSAPP_COUNTRY_CODE') ?: '52';

if (!$token || !$phoneId || !$to) {
    echo json_encode(['success' => false, 'message' => 'Faltan credenciales en config.php (token/phone_id/recipient).']);
    exit;
}

$to = preg_replace('/\D+/', '', $to);
if ($to !== '' && !preg_match('/^\d{11,15}$/', $to)) {
    $to = preg_replace('/^0+/', '', $to);
    if ($cc && strpos($to, $cc) !== 0) {
        $to = $cc . $to;
    }
}

$msg = "Prueba Genesis " . date('Y-m-d H:i:s');
$url = 'https://graph.facebook.com/v20.0/' . rawurlencode($phoneId) . '/messages';
$payload = [
    'messaging_product' => 'whatsapp',
    'recipient_type' => 'individual',
    'to' => $to,
    'type' => 'text',
    'text' => [
        'preview_url' => false,
        'body' => $msg,
    ],
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json',
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err = curl_error($ch);
curl_close($ch);

$ok = ($err === '' && $httpCode >= 200 && $httpCode < 300);
echo json_encode([
    'success' => $ok,
    'httpCode' => $httpCode,
    'error' => $err,
    'response' => json_decode($response, true) ?: $response,
]);
