import React from 'react';
import './ServiciosGrandes.css';

export default function ServiciosGrandes() {
  return (
    <section className="serv2-wrapper">
      <div className="serv2-inner">
        <img src="/nube.png" alt="Nube izquierda" className="serv2-nube-izq" />
        <img src="/nube.png" alt="Nube derecha" className="serv2-nube-der" />
        <img src="/logo_genesis.png" alt="Logo Genesis" className="serv2-logo-genesis" />

        <img src="/SiigoAspel (1).png" alt="Siigo Aspel" className="serv2-logos" />

        <h2 className="serv2-titulo">
          <span>LÍDER EN EL MERCADO DE SOFTWARE</span>
          <span>ADMINISTRATIVO, CONTABLE Y DE</span>
          <span>FACTURACIÓN ELECTRÓNICA</span>
        </h2>

        <div className="serv2-bottom">
          <div className="serv2-texto">SERVICIOS</div>
          <img src="/FONDO_SUETER_ROJO.png" alt="Fondo rojo" className="serv2-mancha" />
          <img src="/SUETER_ROJO.png" alt="Mujer con suéter rojo" className="serv2-chica" />
        </div>

        <div className="serv2-cuadros">
          <div className="serv2-cuadro-item">
            <img src="/cuadro.png" alt="Cuadro 1" />
            <p className="serv2-cuadro-texto">
              SUSCRIPCIÓN Y ACTUALIZACIÓN<br />
              DE SISTEMAS<br />
              SIIGO ASPEL
            </p>
          </div>

          <div className="serv2-cuadro-item">
            <img src="/cuadro.png" alt="Cuadro 2" />
            <p className="serv2-cuadro-texto">
              CONSULTORÍA<br />
              ASPEL DE CALIDAD
            </p>
          </div>

          <div className="serv2-cuadro-item">
            <img src="/cuadro.png" alt="Cuadro 3" />
            <p className="serv2-cuadro-texto">
              CAPACITACIÓN:<br />
              CURSOS Y TALLERES
            </p>
          </div>

          <div className="serv2-cuadro-item">
            <img src="/cuadro.png" alt="Cuadro 4" />
            <p className="serv2-cuadro-texto">
              DESARROLLO DE<br />
              APLICACIONES
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
