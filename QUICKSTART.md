# 🚀 Quick Start - Genesis React

## ¿Qué se instaló?

✅ **Node.js** - Ya está en tu sistema  
✅ **Vite + React** - Framework de desarrollo  
✅ **Componentes Base** - Header, Hero, Services  
✅ **Assets** - Imágenes copiadas a `frontend/public/`  
✅ **Backend Proxy** - Conexión a `send_form.php`

## Iniciar en 1 minuto

### Opción 1: Usar Script (Windows)
Haz doble clic en: **`dev-server.bat`**

### Opción 2: Manual
```bash
cd C:\xampp\htdocs\Genesis\frontend
npm run dev
```

Luego abre: **http://localhost:5173**

## Compilar para Producción

### Opción 1: Usar Script (Windows)
Haz doble clic en: **`build.bat`**

### Opción 2: Manual
```bash
cd C:\xampp\htdocs\Genesis\frontend
npm run build
```

Los archivos compilados estarán en: `C:\xampp\htdocs\Genesis\dist-react\`

## Estructura del Proyecto

```
C:\xampp\htdocs\Genesis\
├── frontend/                    ← Tu proyecto React
│   ├── src/
│   │   ├── components/         ← Componentes (Header, Hero, etc)
│   │   ├── App.jsx             ← Componente raíz
│   │   └── main.jsx            ← Entry point
│   ├── public/                 ← Imágenes y assets estáticos
│   ├── vite.config.js          ← Configuración (proxy incluido)
│   └── package.json            ← Dependencias
├── send_form.php               ← Backend PHP (conectado)
├── email_config.php            ← Config SMTP
├── dev-server.bat              ← Script para desarrollo
├── build.bat                   ← Script para compilación
├── MIGRATION_GUIDE.md          ← Guía completa de integración
└── QUICKSTART.md               ← Este archivo
```

## Formulario de Contacto

El formulario en la sección Hero está conectado al backend PHP:

1. Usuario completa los campos (Nombre, Empresa, Email, Teléfono, Asunto)
2. Hace clic en **Enviar**
3. React envía JSON a `/send_form.php` 
4. PHP procesa y envía email a `soportefusionag@gmail.com`
5. Modal de éxito aparece en React

## Editar Componentes

Para modificar el Header:
```
frontend/src/components/Header.jsx       ← HTML y lógica
frontend/src/components/Header.css       ← Estilos
```

Cambios se reflejan automáticamente en http://localhost:5173

## Agregar Imágenes

1. Copia imagen a `frontend/public/`
2. En React: `<img src="/nombre-imagen.jpg" alt="Descripción" />`

Ejemplo:
```jsx
<img src="/logo.png" alt="Logo Genesis" />
<img src="/fondooo.jpg" alt="Fondo" />
```

## Próximos Componentes

Según el MIGRATION_GUIDE.md, aún falta:
- ⏳ Ubicanos (Mapa + sucursales)
- ⏳ About (Misión, Visión)
- ⏳ Productos Aspel
- ⏳ Redes Sociales
- ⏳ Footer

## Problemas?

### El servidor no inicia
```bash
npm install  # Instala dependencias nuevamente
npm run dev
```

### Cambios CSS no aparecen
- Presiona F5 en el navegador
- O detén el servidor y reinicia

### El formulario no envía
- Asegúrate que XAMPP está corriendo
- Verifica `send_form.php` existe
- Abre DevTools (F12) → Console para ver errores

## Más Información

- 📖 [MIGRATION_GUIDE.md](./MIGRATION_GUIDE.md) - Guía completa
- 📖 [frontend/README.md](./frontend/README.md) - Documentación del proyecto
- 🔧 [frontend/vite.config.js](./frontend/vite.config.js) - Configuración avanzada

---

**¿Listo para empezar?**

1. Haz doble clic en `dev-server.bat`
2. Se abrirá tu navegador en http://localhost:5173
3. ¡Comienza a editar componentes en React!
