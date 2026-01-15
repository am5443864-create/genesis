<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Test Email - Genesis</title>
  <style>
    body { font-family: system-ui, Arial, sans-serif; padding: 24px; background:#fafafa; }
    .card { background: #fff; border: 1px solid #eee; border-radius: 10px; padding: 20px; max-width: 600px; }
    h2 { color: #ff6b35; }
    button { margin-top: 16px; padding: 10px 16px; border: none; border-radius: 8px; background: #ff6b35; color:#fff; font-weight: 700; cursor: pointer; }
    pre { background: #111; color:#0f0; padding: 12px; border-radius: 8px; overflow:auto; margin-top: 16px; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Prueba de Envío de Email</h2>
    <p>Este test enviará un formulario de prueba a <b>soportefusionag@gmail.com</b></p>
    <button id="testAsesoria">Probar Formulario Asesoría</button>
    <button id="testContacto">Probar Formulario Contacto</button>
    <pre id="out">(sin ejecutar)</pre>
  </div>

  <script>
    document.getElementById('testAsesoria').addEventListener('click', async () => {
      document.getElementById('out').textContent = 'Enviando formulario de asesoría...';
      const formData = new FormData();
      formData.append('form_type', 'asesoria');
      formData.append('nombre', 'Juan Pérez Test');
      formData.append('email', 'test@ejemplo.com');
      formData.append('telefono', '2221234567');
      formData.append('estado', 'Puebla');
      formData.append('quien_eres', 'cliente');
      
      try {
        const res = await fetch('send_form.php', { method: 'POST', body: formData });
        const json = await res.json();
        document.getElementById('out').textContent = JSON.stringify(json, null, 2);
      } catch (e) {
        document.getElementById('out').textContent = 'Error: ' + e;
      }
    });

    document.getElementById('testContacto').addEventListener('click', async () => {
      document.getElementById('out').textContent = 'Enviando formulario de contacto...';
      const formData = new FormData();
      formData.append('form_type', 'contacto');
      formData.append('nombre', 'María González Test');
      formData.append('email', 'maria@ejemplo.com');
      formData.append('asunto', 'Consulta sobre servicios');
      
      try {
        const res = await fetch('send_form.php', { method: 'POST', body: formData });
        const json = await res.json();
        document.getElementById('out').textContent = JSON.stringify(json, null, 2);
      } catch (e) {
        document.getElementById('out').textContent = 'Error: ' + e;
      }
    });
  </script>
</body>
</html>
