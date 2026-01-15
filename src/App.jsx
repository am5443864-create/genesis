import Header from './components/Header'
import Hero from './components/Hero'
import Nosotros from './components/Nosotros'
import MisionVision from './components/MisionVision'
import ServiciosGrandes from './components/ServiciosGrandes'
import ServiciosTecnicos from './components/ServiciosTecnicos'
import ProductosAspel from './components/ProductosAspel'
import Ubicanos from './components/Ubicanos'
import Footer from './components/Footer'
import './App.css'

export default function App() {
  return (
    <div className="app">
      <Header />
      <Hero />
      <Nosotros />
      <MisionVision />
      <ServiciosGrandes />
      <ServiciosTecnicos />
      <ProductosAspel />
      <Ubicanos />
      <Footer />
    </div>
  )
}
