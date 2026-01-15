import React from 'react';
import './MisionVision.css';

export default function MisionVision() {
  return (
    <section className="mision-vision">
      <div className="mv-container">
        <div className="mv-box">
          <h3>Misión</h3>
          <p>Proveer soluciones sencillas, eficientes y productivas para el control de su negocio a través de consultoría en TI, Sistemas Administrativos y Contables ASPEL.</p>
        </div>
        <div className="mv-divider"></div>
        <div className="mv-box">
          <h3>Visión</h3>
          <p>Ser el Corporativo líder en integración de soluciones administrativas-contables ASPEL y de TI, garantizando la entera satisfacción del cliente a través de atención y servicio de calidad y vanguardia.</p>
        </div>
      </div>
    </section>
  );
}
