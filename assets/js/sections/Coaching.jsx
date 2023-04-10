import React from 'react'
import { createRoot } from 'react-dom/client'

function Coaching() {
    return <h3>Projets transverses d’innovation</h3>
}

const container = document.querySelector('[data-component="coaching"]')
if (container) {
    createRoot(container).render(<Coaching />)
}
