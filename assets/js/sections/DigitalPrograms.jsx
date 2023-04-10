import React from 'react'
import { createRoot } from 'react-dom/client'

function DigitalPrograms() {
    return <h3>Développer des programmes d'entrepreneuriat digitale</h3>
}

const container = document.querySelector('[data-component="digital-programs"]')
if (container) {
    createRoot(container).render(<DigitalPrograms />)
}
