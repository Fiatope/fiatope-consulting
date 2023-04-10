import React from 'react'
import { createRoot } from 'react-dom/client'

function MobileAdvices() {
    return <h3>Projets transverses d’innovation</h3>
}

const container = document.querySelector('[data-component="mobile-advices"]')
if (container) {
    createRoot(container).render(<MobileAdvices />)
}
