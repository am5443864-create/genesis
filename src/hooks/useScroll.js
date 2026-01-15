import { useState, useEffect } from 'react'

export function useScroll() {
  const [isScrolled, setIsScrolled] = useState(false)

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 50)
    }

    window.addEventListener('scroll', handleScroll)
    return () => window.removeEventListener('scroll', handleScroll)
  }, [])

  return isScrolled
}

export function useFormValidation(initialValues) {
  const [values, setValues] = useState(initialValues)
  const [errors, setErrors] = useState({})

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target
    setValues(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }))
  }

  const validate = () => {
    const newErrors = {}
    
    if (!values.nombre?.trim()) {
      newErrors.nombre = 'El nombre es requerido'
    }
    if (!values.email?.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
      newErrors.email = 'Email inválido'
    }
    if (!values.telefono?.trim()) {
      newErrors.telefono = 'El teléfono es requerido'
    }
    if (!values.acepta) {
      newErrors.acepta = 'Debes aceptar las políticas'
    }

    setErrors(newErrors)
    return Object.keys(newErrors).length === 0
  }

  const reset = () => {
    setValues(initialValues)
    setErrors({})
  }

  return { values, errors, handleChange, validate, reset, setValues }
}
