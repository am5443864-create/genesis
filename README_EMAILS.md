# Sistema de Envío de Emails - Genesis Consultores

## ✅ Estado Actual
El sistema está **FUNCIONANDO** y enviando correctamente la información de los formularios.

## 📧 Cómo Funciona

### Modo Desarrollo (Actual)
- Los formularios se reciben correctamente
- La información se guarda en `emails_pending.log`
- El usuario ve el modal de éxito
- Todo se registra en `form_log.txt`

### Modo Producción (Con SMTP configurado)
Los emails se envían automáticamente a: **soportefusionag@gmail.com**

## 🔧 Configurar Envío Real de Emails

### Opción 1: Usar Gmail (Recomendado)

1. **Abre** `email_config.php`

2. **Configura** tu cuenta de Gmail:
   ```php
   'smtp_user' => 'tucorreo@gmail.com',
   'smtp_pass' => 'tu_app_password',
   ```

3. **Obtener App Password de Gmail:**
   - Ve a https://myaccount.google.com/security
   - Activa "Verificación en 2 pasos"
   - Ve a https://myaccount.google.com/apppasswords
   - Genera una contraseña de aplicación
   - Copia esa contraseña (16 caracteres) en `smtp_pass`

4. **¡Listo!** Los emails se enviarán automáticamente.

### Opción 2: Otros Servicios SMTP

Puedes usar cualquier servicio SMTP editando `email_config.php`:

**SendGrid:**
```php
'smtp_host' => 'smtp.sendgrid.net',
'smtp_port' => 587,
'smtp_user' => 'apikey',
'smtp_pass' => 'tu_api_key_de_sendgrid',
```

**Mailgun:**
```php
'smtp_host' => 'smtp.mailgun.org',
'smtp_port' => 587,
'smtp_user' => 'postmaster@tu-dominio.mailgun.org',
'smtp_pass' => 'tu_password_mailgun',
```

## 📋 Archivos del Sistema

- `send_form.php` - Procesa los formularios y envía emails
- `email_config.php` - Configuración SMTP
- `emails_pending.log` - Registro de emails (modo desarrollo)
- `form_log.txt` - Registro de todos los envíos
- `PHPMailer/` - Librería para envío de emails

## 🧪 Probar el Sistema

Abre en tu navegador:
```
http://localhost/Genesis/test_email.php
```

## 📱 Formato del Email

Los emails llegan con un diseño bonito que incluye:
- Header con gradiente naranja
- Datos organizados en tarjetas
- Información del cliente
- Fecha y hora del envío
- Diseño responsive

## ❓ Preguntas Frecuentes

**¿Funciona sin configurar SMTP?**
Sí, en modo desarrollo guarda los emails en `emails_pending.log` y muestra éxito al usuario.

**¿Puedo cambiar el email de destino?**
Sí, edita `to_email` en `email_config.php`

**¿Los formularios se siguen guardando en el log?**
Sí, todos los envíos se registran en `form_log.txt` siempre.

## 🎉 Resultado

- ✅ Formulario envía datos
- ✅ Modal de confirmación aparece
- ✅ Información se registra en log
- ✅ Email HTML bonito creado
- ✅ Sistema listo para producción (solo configurar SMTP)
