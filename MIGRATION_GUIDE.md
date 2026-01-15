# Guía de Integración React + PHP

## Estado Actual

Tu proyecto Genesis está siendo migrado a React. El frontend Vite + React está listo con:

- ✅ **Header**: Navegación con menú mobile responsivo
- ✅ **Hero Section**: Formulario de contacto con validación
- ✅ **Services**: Sección de servicios técnicos  
- ✅ **Assets**: Imágenes y fondos en `frontend/public/`
- ✅ **Proxy Vite**: Redirige requests a `send_form.php` del backend

## Próximos Componentes a Agregar

### 1. **Ubicanos** (Mapa + Ubicaciones)
```jsx
// src/components/Ubicanos.jsx
- Mostrar mapa (leaflet o google maps)
- Tarjetas de ubicaciones (Morelos, Puebla, CDMX)
- Información de contacto por sucursal
```

### 2. **About / Nosotros** (Misión, Visión)
```jsx
// src/components/About.jsx
- Sección de quiénes somos
- Misión y Visión superpuestas en imágenes
- Historia de la empresa
```

### 3. **Productos Aspel**
```jsx
// src/components/AspelProducts.jsx
- Grid de productos (Caja, NOI, PYG, etc.)
- Cards interactivas con información
- Links a detalles
```

### 4. **Redes Sociales**
```jsx
// src/components/SocialLinks.jsx
- Links a Facebook, LinkedIn, Instagram, YouTube
- Iconos SVG o Font Awesome
```

### 5. **Footer**
```jsx
// src/components/Footer.jsx
- Links rápidos
- Información de contacto
- Copyright y legal
```

## Estructura de Carpetas

```
frontend/
├── src/
│   ├── components/
│   │   ├── Header.jsx          ✅ Listo
│   │   ├── Header.css
│   │   ├── Hero.jsx            ✅ Listo (con Formulario)
│   │   ├── Hero.css
│   │   ├── Services.jsx        ✅ Listo
│   │   ├── Services.css
│   │   ├── Ubicanos.jsx        ⏳ Pendiente
│   │   ├── About.jsx           ⏳ Pendiente
│   │   ├── AspelProducts.jsx   ⏳ Pendiente
│   │   ├── SocialLinks.jsx     ⏳ Pendiente
│   │   └── Footer.jsx          ⏳ Pendiente
│   ├── App.jsx                 ✅ Listo
│   ├── App.css
│   ├── index.css
│   └── main.jsx
├── public/                      ✅ Assets copiados
├── vite.config.js              ✅ Con proxy PHP
├── package.json                ✅ Dependencias
└── dist-react/                 ✅ Build de producción
```

## Flujo de Desarrollo

### 1. Iniciar Servidor de Desarrollo
```bash
cd C:\xampp\htdocs\Genesis\frontend
npm run dev
```
- Abre http://localhost:5173
- HMR habilitado (cambios en tiempo real)
- Proxy a `/send_form.php`

### 2. Crear Nuevo Componente
```jsx
// src/components/MiComponente.jsx
import './MiComponente.css'

export default function MiComponente() {
  return (
    <section>
      {/* Tu contenido */}
    </section>
  )
}
```

### 3. Usar en App.jsx
```jsx
import MiComponente from './components/MiComponente'

export default function App() {
  return (
    <div>
      <Header />
      <Hero />
      <MiComponente />  {/* Nuevo */}
      <Services />
      <Footer />
    </div>
  )
}
```

### 4. Compilar para Producción
```bash
npm run build
```
- Genera archivos optimizados en `dist-react/`
- Listo para servir desde XAMPP

## Conexión Backend - Frontend

### Fetch desde React → send_form.php

```javascript
const handleSubmit = async (e) => {
  e.preventDefault()
  
  const response = await fetch('/send_form.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      nombre: formData.nombre,
      empresa: formData.empresa,
      email: formData.email,
      telefono: formData.telefono,
      asunto: formData.asunto,
      acepta: formData.acepta
    })
  })

  const result = await response.json()
  
  if (result.status === 'success') {
    // Mostrar modal de éxito, limpiar form, etc
    setShowModal(true)
  } else {
    alert('Error: ' + result.message)
  }
}
```

### Respuesta Esperada de PHP

```json
{
  "status": "success",
  "message": "Correo enviado a soportefusionag@gmail.com"
}
```

O en caso de error:

```json
{
  "status": "error",
  "message": "Error al enviar el correo"
}
```

## Configuración de Assets

Tus imágenes están en `frontend/public/`:

```
public/
├── fondooo.jpg       ← Fondo general
├── logo.png          ← Logo del header
├── hero-girl.png     ← Imagen hero
├── mujer-full.png    ← Imagen servicios
├── card1.jpg         ← Card servicios 1
├── card2.jpg         ← Card servicios 2
```

Para agregar más imágenes:
1. Colócalas en `frontend/public/`
2. Referencia en React: `<img src="/nombre-imagen.jpg" />`
3. Vite las servirá automáticamente

## Deployment

### Opción A: Servidor Node (Recomendado)
```bash
npm run build
npm run preview
```

### Opción B: XAMPP (Desarrollo)
1. Copia contenido de `dist-react/` a `C:\xampp\htdocs\Genesis\dist-react\`
2. Accede desde `http://localhost/Genesis/dist-react/`

### Opción C: Reemplazar index.php
Puedes hacer que el PHP sirva React de forma más integrada (avanzado).

## Tips & Mejores Prácticas

1. **CSS Modules**: Usa `Componente.module.css` para scope local
2. **Hooks**: Usa `useState`, `useEffect`, `useContext` para state
3. **Fetch**: Siempre maneja errores en network requests
4. **Performance**: Usa lazy loading para componentes grandes
5. **Testing**: Prepara tests con Vitest (opcional)

## Problemas Comunes

### "Cannot GET /send_form.php"
- Asegúrate que XAMPP está corriendo
- Verifica que `send_form.php` existe en `C:\xampp\htdocs\Genesis\`
- Checa la configuración del proxy en `vite.config.js`

### Imágenes no cargan
- Coloca las imágenes en `frontend/public/`
- Referencia: `<img src="/imagen.jpg" />`

### Cambios CSS no se ven
- Si estás en modo dev (`npm run dev`), presiona F5
- Si es en producción, regenera el build: `npm run build`

## Próximos Pasos

1. ✅ **Setup React** - Completado
2. ✅ **Componentes Base** - Header, Hero, Services
3. ⏳ **Agregar Ubicanos, About, Products**
4. ⏳ **Mejorar formulario con validación**
5. ⏳ **Agregar Footer**
6. ⏳ **Testing y optimización**
7. ⏳ **Deploy a producción**

---

¿Necesitas ayuda con algún componente específico? Avísame.
