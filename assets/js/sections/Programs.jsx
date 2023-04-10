import React from 'react'
import { createRoot } from 'react-dom/client'

function Programs() {
    return (
        <h3>Programmes d’accéleration d'entrepreneurs vers le financement</h3>
    )
}

const container = document.querySelector('[data-component="programs"]')
if (container) {
    createRoot(container).render(<Programs />)
}
