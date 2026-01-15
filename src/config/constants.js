// Ejemplo de configuración para desarrollo
// Este archivo no se incluye en el build de producción

export const API_CONFIG = {
  // URL base para requests a PHP
  BASE_URL: process.env.VITE_API_URL || 'http://localhost/Genesis',
  
  // Endpoints
  ENDPOINTS: {
    SUBMIT_FORM: '/send_form.php',
    // Agregar más endpoints aquí
  },

  // Timeouts
  TIMEOUT: 5000,

  // Modo debug
  DEBUG: process.env.VITE_DEBUG === 'true',
}

// Colores del tema
export const THEME = {
  primary: '#0D2D69',    // Azul
  accent: '#F39A16',     // Naranja
  white: '#ffffff',
  text: '#0D2D69',
  light: '#E7ECF3',
}

// Mensajes de validación
export const VALIDATION_MESSAGES = {
  nombre: 'Por favor ingresa tu nombre',
  email: 'Por favor ingresa un email válido',
  telefono: 'Por favor ingresa tu teléfono',
  empresa: 'Por favor ingresa el nombre de tu empresa',
  asunto: 'Por favor ingresa un asunto',
  acepta: 'Debes aceptar las políticas de privacidad',
}
