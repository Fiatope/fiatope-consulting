import React from 'react'
import { createRoot } from 'react-dom/client'

function Academic() {
    return <h3>Interventions académiques : 3 secteurs</h3>
}

const container = document.querySelector('[data-component="academic"]')
if (container) {
    createRoot(container).render(<Academic />)
}
