<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Test WhatsApp Cloud API</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; padding: 24px; background:#fafafa; }
    .card { background: #fff; border: 1px solid #eee; border-radius: 10px; padding: 20px; max-width: 720px; }
    label { display:block; margin: 12px 0 6px; font-weight: 600; }
    input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; }
    button { margin-top: 16px; padding: 10px 16px; border: none; border-radius: 8px; background: #25D366; color:#fff; font-weight: 700; cursor: pointer; }
    pre { background: #111; color:#0f0; padding: 12px; border-radius: 8px; overflow:auto; }
    .hint { color:#666; font-size: 12px; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Probar WhatsApp Cloud API</h2>
    <p>Pega tu <b>Token</b>, <b>Phone Number ID</b> y el <b>Destino</b>. El destino se normaliza a formato internacional (se antepone 52 si no lo tiene).</p>
    <label>Token</label>
    <input id="token" placeholder="EAAG..." />
    <div class="hint">Meta Developers → WhatsApp → API Setup → Permanent token</div>

    <label>Phone Number ID</label>
    <input id="phone_id" placeholder="123456789012345" />
    <div class="hint">Meta Developers → WhatsApp → API Setup → Phone number ID</div>

    <label>Destino (número)</label>
    <input id="to" value="2462226280" />
    <div class="hint">Para México, se prependerá 52 si no está presente.</div>

    <button id="run">Enviar prueba</button>

    <h3>Respuesta</h3>
    <pre id="out">(sin ejecutar)</pre>
  </div>

  <script>
    document.getElementById('run').addEventListener('click', async () => {
      const token = encodeURIComponent(document.getElementById('token').value.trim());
      const phone = encodeURIComponent(document.getElementById('phone_id').value.trim());
      const to = encodeURIComponent(document.getElementById('to').value.trim());
      if (!token || !phone || !to) {
        document.getElementById('out').textContent = 'Completa token, phone_id y destino';
        return;
      }
      document.getElementById('out').textContent = 'Enviando...';
      try {
        const res = await fetch(`test_whatsapp.php?token=${token}&phone_id=${phone}&to=${to}`);
        const json = await res.json();
        document.getElementById('out').textContent = JSON.stringify(json, null, 2);
      } catch (e) {
        document.getElementById('out').textContent = 'Error: ' + e;
      }
    });
  </script>
</body>
</html>
