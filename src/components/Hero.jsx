import { useState } from 'react'
import './Hero.css'

export default function Hero() {
  const [formData, setFormData] = useState({
    nombre: '',
    email: '',
    telefono: '',
    estado: '',
    acepta: false
  })

  const [loading, setLoading] = useState(false)
  const [showModal, setShowModal] = useState(false)

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }))
  }

  const handleSubmit = async (e) => {
    e.preventDefault()
    setLoading(true)

    try {
      const response = await fetch('/send_form.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
      })

      const result = await response.json()
      if (result.status === 'success') {
        setShowModal(true)
        setFormData({
          nombre: '', email: '', telefono: '', estado: '', acepta: false
        })
      } else {
        alert('Error al enviar: ' + result.message)
      }
    } catch (err) {
      console.error(err)
      alert('Error al conectar con el servidor')
    } finally {
      setLoading(false)
    }
  }

  return (
    <>
      <section className="hero-wrap" id="inicio">
        <div className="hero">
          <svg className="hero-bg" viewBox="0 0 1366 500" preserveAspectRatio="none">
            <path d="M0,100 Q200,50 400,80 T800,100 L1366,0 L1366,500 L0,500 Z" fill="#F39A16" />
          </svg>

          <div className="form-block">
            <h1>Para una asesoría gratuita, <span>¡déjanos tus datos!</span></h1>
            <form onSubmit={handleSubmit}>
              <div className="field">
                <input
                  type="text"
                  name="nombre"
                  placeholder="Nombre y Apellido"
                  value={formData.nombre}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="field">
                <input
                  type="email"
                  name="email"
                  placeholder="E-mail"
                  value={formData.email}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="field-inline">
                <input
                  type="tel"
                  name="telefono"
                  placeholder="Teléfono"
                  value={formData.telefono}
                  onChange={handleChange}
                  required
                />
                <input
                  type="text"
                  name="estado"
                  placeholder="Estado"
                  value={formData.estado}
                  onChange={handleChange}
                  required
                />
              </div>
              <label className="check-wrap">
                <input
                  type="checkbox"
                  name="acepta"
                  checked={formData.acepta}
                  onChange={handleChange}
                />
                <span className="check-custom"></span>
                Acepto aviso de privacidad
              </label>
              <button type="submit" className="btn-enviar" disabled={loading}>
                {loading ? 'Enviando...' : 'Enviar'}
              </button>
            </form>
          </div>

          <img src="/hero-girl.png" alt="Profesional" className="hero-girl" />
        </div>
      </section>

      {showModal && (
        <div className="modal-overlay" onClick={() => setShowModal(false)}>
          <div className="modal-content" onClick={(e) => e.stopPropagation()}>
            <h2>¡Gracias!</h2>
            <p>Tu información ha sido recibida correctamente.</p>
            <p>Nuestro equipo se pondrá en contacto contigo pronto.</p>
            <button onClick={() => setShowModal(false)}>Cerrar</button>
          </div>
        </div>
      )}
    </>
  )
}
