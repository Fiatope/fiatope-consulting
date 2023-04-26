import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import Customers from '../components/Customers'

function Backers() {
    const [customers, setCustomers] = useState([])
    useEffect(() => {
        fetch('api/customer/all?types=backer')
            .then((res) => res.json())
            .then((data) => {
                setCustomers(data)
            })
    }, [])

    return (
        <>
            <h3>
                Soutiens aux bailleurs de fonds pour renforcer l’entreprenariat
            </h3>
            <div className="area-section_customers">
                <Customers customers={customers}/>
            </div>
        </>
    )
}

const container = document.querySelector('[data-component="backers"]')
if (container) {
    createRoot(container).render(<Backers />)
}
