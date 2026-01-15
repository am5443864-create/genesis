import { useState } from 'react'

export async function submitForm(formData) {
  try {
    const response = await fetch('/send_form.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData)
    })

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`)
    }

    const result = await response.json()
    return result
  } catch (error) {
    console.error('Error submitting form:', error)
    throw error
  }
}

export function useApi(url, options = {}) {
  const [loading, setLoading] = useState(false)
  const [error, setError] = useState(null)
  const [data, setData] = useState(null)

  const fetch = async (body = null) => {
    setLoading(true)
    setError(null)

    try {
      const response = await window.fetch(url, {
        method: body ? 'POST' : 'GET',
        headers: { 'Content-Type': 'application/json', ...options.headers },
        body: body ? JSON.stringify(body) : undefined,
        ...options
      })

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }

      const result = await response.json()
      setData(result)
      return result
    } catch (err) {
      setError(err.message)
      throw err
    } finally {
      setLoading(false)
    }
  }

  return { loading, error, data, fetch }
}
