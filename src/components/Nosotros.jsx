import React, { useEffect, useState } from 'react';
import './Nosotros.css';

export default function Nosotros() {
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
        }
      },
      { threshold: 0.3 }
    );

    const element = document.querySelector('.nosotros-anim');
    if (element) observer.observe(element);

    return () => {
      if (element) observer.unobserve(element);
    };
  }, []);

  return (
    <section id="nosotros" className="nosotros-wrap">
      <div className="nosotros">
        <div className={`nosotros-anim ${isVisible ? 'in-view' : ''}`}>
          <img src="/tipo.png" alt="Fondo azul Nosotros" className="nosotros-bg" />
        </div>
      </div>
    </section>
  );
}
