import { useState } from 'react'
import './Header.css'

export default function Header() {
  const [menuOpen, setMenuOpen] = useState(false)

  return (
    <header className="site-top">
      <div className="top-inner">
        <div className="nav-row">
          <div className="nav-left">
            <img src="/logo.png" alt="Genesis" className="logo" />
          </div>
          
          <div className="hamburger" onClick={() => setMenuOpen(!menuOpen)}>
            <span></span>
          </div>

          <nav className={`main-nav ${menuOpen ? 'open' : ''}`}>
            <ul>
              <li><a href="#inicio">INICIO</a></li>
              <li><a href="#nosotros">NOSOTROS</a></li>
              <li><a href="#servicios">SERVICIOS</a></li>
              <li><a href="#agendar">AGENDAR</a></li>
              <li><a href="#ubicanos">CONTACTO</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  )
}
