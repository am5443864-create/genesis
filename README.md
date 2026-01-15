# Genesis Frontend (React + Vite)

## Instalación y Configuración

Este es el frontend React para el proyecto Genesis. Usa Vite como bundler y se conecta con el backend PHP en `send_form.php`.

### Estructura de Carpetas
```
frontend/
├── public/          # Assets estáticos (imágenes, fuentes)
├── src/
│   ├── components/  # Componentes React (Header, Hero, Services)
│   ├── App.jsx      # Componente principal
│   ├── App.css      # Estilos globales
│   ├── index.css    # Reset CSS
│   └── main.jsx     # Entry point
├── vite.config.js   # Configuración de Vite + Proxy a PHP
└── package.json     # Dependencias
```

## Scripts de Desarrollo

### Servidor de Desarrollo (con HMR y proxy PHP)
```bash
npm run dev
```
- Abre http://localhost:5173 automáticamente
- El proxy redirige `/send_form.php` a `http://localhost/Genesis/send_form.php`
- HMR habilitado para cambios en tiempo real

### Build para Producción
```bash
npm run build
```
- Genera archivos optimizados en `dist-react/`
- El build incluye tree-shaking de React y otros paquetes

### Preview de Build Local
```bash
npm run preview
```
- Prueba la versión compilada en http://localhost:4173

## Conexión con Backend PHP

### Endpoints
- **Form Submission**: `POST /send_form.php`
  - Espera JSON con: `nombre`, `empresa`, `email`, `telefono`, `asunto`, `acepta`
  - Responde con: `{ status: 'success', message: '...' }` o error

### Como hacer Fetch desde React
```javascript
const response = await fetch('/send_form.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({
    nombre: '...',
    empresa: '...',
    email: '...',
    telefono: '...',
    asunto: '...',
    acepta: true
  })
})

const result = await response.json()
if (result.status === 'success') {
  // Envío exitoso
}
```

## Deployment

### Opción 1: Servidor Node (Producción)
```bash
npm run build
npm run preview  # Usa http-server o similar
```

### Opción 2: XAMPP (Desarrollo)
1. Copia archivos de `dist-react/` a `C:\xampp\htdocs\Genesis\dist-react\`
2. Accede desde http://localhost/Genesis/dist-react/

### Opción 3: Integración en PHP
1. Reemplaza `index.php` con un proxy que sirva `dist-react/index.html`
2. Coloca los assets de `dist-react/` en una carpeta estática accesible

## Configuración de Assets (Imágenes)

Copia tus imágenes de Genesis al directorio `public/`:
```
public/
├── fondooo.jpg       # Fondo
├── logo.png          # Logo
├── hero-girl.png     # Imagen de hero
├── card1.jpg         # Card 1 de servicios
├── card2.jpg         # Card 2 de servicios
├── mujer-full.png    # Imagen grande de servicios
└── ...
```

## Configuración SMTP para Emails

El backend PHP usa `email_config.php` para enviar emails. Asegúrate de tener credenciales SMTP válidas:
```php
// email_config.php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'tu-email@gmail.com');
define('SMTP_PASS', 'app-password');
define('TO_EMAIL', 'soportefusionag@gmail.com');
```

## Próximos Pasos

1. **Copiar Assets**: Coloca imágenes de Genesis en `frontend/public/`
2. **Agregar Componentes**: Crea más componentes en `src/components/` (Ubicanos, Footer, etc.)
3. **Styles**: Usa CSS modules o Tailwind según prefieras
4. **Deploy**: Prueba en desarrollo, luego compila para producción

