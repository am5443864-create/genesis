# 🚀 Genesis - Proyecto Migrado a React

## ✨ ¡INSTALACIÓN COMPLETADA!

Tu proyecto Genesis ha sido **100% migrado a React + Vite**. 

---

## ⚡ Inicio Rápido (30 segundos)

### Opción 1: Script Fácil (Recomendado)
```bash
# Windows - Haz doble clic:
dev-server.bat
```

### Opción 2: Terminal
```bash
cd frontend
npm run dev
```

Luego abre: **http://localhost:5173**

---

## 📦 ¿Qué se instaló?

✅ **Vite 5.4.21** - Build tool ultra rápido  
✅ **React 18.3.1** - Framework UI moderno  
✅ **4 Componentes Base** - Header, Hero, Services, Footer  
✅ **Backend Proxy** - Conectado a `send_form.php`  
✅ **Assets Optimizados** - 6 imágenes copiadas  
✅ **Documentación Completa** - 4 guías en Markdown  

---

## 📚 Documentación

Abre cualquiera de estos archivos para más información:

| Archivo | Descripción | Tiempo |
|---------|-------------|--------|
| **QUICKSTART.md** | Guía rápida para empezar | 5 min |
| **SETUP_COMPLETE.md** | Resumen completo | 10 min |
| **MIGRATION_GUIDE.md** | Cómo agregar componentes | 15 min |
| **setup-guide.html** | Vista visual | 2 min |

---

## 🎯 Estructura del Proyecto

```
Genesis/
├── frontend/                    ← Tu proyecto React
│   ├── src/
│   │   ├── components/          ✅ Header, Hero, Services, Footer
│   │   ├── hooks/               ✅ useScroll, useFormValidation
│   │   ├── services/            ✅ api.js
│   │   ├── config/              ✅ constants.js
│   │   └── main.jsx
│   ├── public/                  ✅ Imágenes
│   ├── vite.config.js           ✅ Con proxy PHP
│   └── dist-react/              ✅ Build de producción
├── send_form.php                ✅ Backend (conectado)
├── dev-server.bat               ⚡ Inicia servidor
├── build.bat                    🔨 Compila
└── QUICKSTART.md                📖 Lee esto primero
```

---

## 🔌 Formulario de Contacto

El formulario en la sección **Hero** está completamente funcional:

1. **Usuario** llena: Nombre, Empresa, Email, Teléfono, Asunto
2. **Envía** → React valida y envía JSON a `/send_form.php`
3. **Backend PHP** → Procesa y envía email via PHPMailer + SMTP
4. **Confirmación** → Modal de éxito en React

**Email va a**: `soportefusionag@gmail.com`  
**Log guardado en**: `form_log.txt`

---

## 🎨 Componentes Implementados

### ✅ Header
- Logo y navegación
- Menú hamburguesa mobile
- Efecto sticky con scroll

### ✅ Hero Section
- Formulario de 6 campos
- Validación de email
- Modal de confirmación
- Imagen profesional

### ✅ Services
- Título animado
- 2 cards de servicios
- Imagen grande

### ✅ Footer
- 4 secciones
- Links y contacto
- Copyright dinámico

---

## 🚀 Próximos Pasos

Según la documentación, aún falta agregar:

- ⏳ **Ubicanos** - Mapa + 3 sucursales
- ⏳ **About** - Misión y Visión
- ⏳ **Productos** - Grid de productos Aspel
- ⏳ **Redes** - Icons sociales

**Cómo hacerlo**: Ver [MIGRATION_GUIDE.md](./MIGRATION_GUIDE.md)

---

## 📝 Scripts Disponibles

```bash
# Desarrollo (con HMR y proxy PHP)
npm run dev

# Compilar para producción
npm run build

# Preview del build
npm run preview
```

---

## 🧪 Testing

### Prueba la conexión PHP:
1. Abre http://localhost:5173
2. Llena el formulario Hero
3. Presiona **Enviar**
4. ✅ Deberías ver modal de éxito
5. ✅ Email llega a soportefusionag@gmail.com
6. ✅ Log en `form_log.txt`

### Compila para producción:
```bash
npm run build
# Archivos en: frontend/dist-react/
```

---

## ⚙️ Configuración SMTP

Para que los emails funcionen, asegúrate que `email_config.php` tenga:

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'tu-email@gmail.com');
define('SMTP_PASS', 'app-password');  // 2FA enabled
define('TO_EMAIL', 'soportefusionag@gmail.com');
```

---

## 💡 Tips Útiles

- **F5** para refrescar si algo no carga
- **F12** para DevTools y ver errores
- **Ctrl+C** en terminal para detener servidor
- Los cambios en React se reflejan automáticamente (HMR)

---

## 🆘 Problemas?

**El servidor no inicia:**
```bash
npm install
npm run dev
```

**Los emails no llegan:**
- Verifica SMTP en `email_config.php`
- Abre DevTools (F12) → Console
- Revisa `form_log.txt`

**Cambios CSS no aparecen:**
- F5 en navegador
- O detén y reinicia servidor

---

## 🎉 ¡Listo para Empezar!

1. Ejecuta: `dev-server.bat`
2. Se abre: http://localhost:5173
3. ¡Comienza a editar los componentes!

---

## 📞 Información

- **Vite**: v5.4.21
- **React**: 18.3.1
- **Node.js**: 22.14.0
- **Última actualización**: 12 de Enero, 2026

---

**¿Necesitas ayuda?** Revisa la documentación en Markdown o abre `setup-guide.html` en tu navegador.

**¡Que disfrutes el desarrollo con React!** 🚀✨
