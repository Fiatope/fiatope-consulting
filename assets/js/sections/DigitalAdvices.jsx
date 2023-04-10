import React from 'react'
import { createRoot } from 'react-dom/client'

function DigitalAdvices() {
    return <h4>Cursus entrepreneur</h4>
}

const container = document.querySelector('[data-component="digital-advices"]')
if (container) {
    createRoot(container).render(<DigitalAdvices />)
}
