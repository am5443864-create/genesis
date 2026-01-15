import React, { useState } from 'react';
import './Ubicanos.css';

export default function Ubicanos() {
  const [formData, setFormData] = useState({
    nombre: '',
    email: '',
    mensaje: ''
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    // Implementar envío del formulario
    console.log('Formulario enviado:', formData);
    setFormData({ nombre: '', email: '', mensaje: '' });
  };

  return (
    <section className="ubicanos-wrap" id="ubicanos">
      <div className="ubicanos-inner">
        <img className="ubicanos-title-img" src="/UBICANOS.png" alt="Ubícanos" />

        <div className="ubicanos-plane">
          <img className="plane-img" src="/AVION_FONDO_1.png" alt="Avión fondo" />

          <div className="loc loc-morelos">
            <img className="loc-pin" src="/MARCADOR.png" alt="Pin Morelos" />
            <div className="loc-label">
              <img className="loc-cloud" src="/nube_sola.png" alt="Nube" />
              <span>MORELOS</span>
            </div>
          </div>

          <div className="loc loc-puebla">
            <img className="loc-pin" src="/MARCADOR.png" alt="Pin Puebla" />
            <div className="loc-label">
              <img className="loc-cloud" src="/nube_sola.png" alt="Nube" />
              <span>PUEBLA</span>
            </div>
          </div>

          <div className="loc loc-cdmx">
            <img className="loc-pin" src="/MARCADOR.png" alt="Pin CDMX" />
            <div className="loc-label">
              <img className="loc-cloud" src="/nube_sola.png" alt="Nube" />
              <span>CDMX</span>
            </div>
          </div>

          <div className="addr addr-morelos">
            <a href="https://wa.me/522227059542" target="_blank" rel="noopener noreferrer">
              222 705 9542
            </a>
          </div>

          <div className="addr addr-puebla">
            <a href="https://wa.me/522227391871" target="_blank" rel="noopener noreferrer">
              222 739 1871
            </a>
          </div>

          <div className="addr addr-cdmx">
            <a href="https://wa.me/522227059542" target="_blank" rel="noopener noreferrer">
              222 705 9542
            </a>
          </div>

          <div className="contacto-form">
            <h3>Contáctanos</h3>
            <form onSubmit={handleSubmit}>
              <input
                type="text"
                name="nombre"
                placeholder="Nombre"
                value={formData.nombre}
                onChange={handleChange}
                required
              />
              <input
                type="email"
                name="email"
                placeholder="Email"
                value={formData.email}
                onChange={handleChange}
                required
              />
              <textarea
                name="mensaje"
                placeholder="Mensaje"
                value={formData.mensaje}
                onChange={handleChange}
                required
              ></textarea>
              <button type="submit">Enviar</button>
            </form>
          </div>

          <img className="genesis-logo" src="/logo_genesis.png" alt="Logo Genesis" />
          <img className="genesis-cloud" src="/nube_sola.png" alt="Nube" />
        </div>
      </div>
    </section>
  );
}
