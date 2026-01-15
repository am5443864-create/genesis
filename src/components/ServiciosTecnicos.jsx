import React from 'react';
import './ServiciosTecnicos.css';

export default function ServiciosTecnicos() {
  return (
    <section id="servicios" className="servtec-section">
      <div className="servtec-wrap">
        <div className="servtec-title">
          <div className="t1">SERVIDORES</div>
          <div className="t2">VIRTUALES</div>
        </div>

        <div className="servtec-cards">
          <div className="serv-card-inline card1">
            <img src="/nube_naranja.png" alt="Servidores en la Nube" />
            <div className="serv-text-overlay">
              <h3>Servidores en la Nube</h3>
              <p>Es un servicio que te permite acceder de forma remota a los sistemas ASPEL, de forma sencilla y segura desde cualquier lugar y momento</p>
            </div>
          </div>

          <div className="serv-card-inline card2">
            <img src="/nube_naranja_1.png" alt="Servidores Físicos" />
            <div className="serv-text-overlay">
              <h3>Servidores Físicos</h3>
              <p>Instalación, Configuración, Respaldos, y Administración servidores físicos y en la nube</p>
              <p>El objetivo de estos servidores es que pueden compartir los sistemas SIIGO - ASPEL, las herramientas de software y acceder a las bases de datos de la empresa dentro y fuera de las instalaciones cuidando siempre la integridad de la información.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
