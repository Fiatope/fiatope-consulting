import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'

const Backers = () => {
    const [customers, setCustomers] = useState([])
    useEffect(() => {
        fetch('api/customer/?types=backer')
            .then(res => res.json())
            .then(data => {
                setCustomers(data)
                console.log(data[0])
            })
    }, [])

    return (
        <>
            <h3>Soutiens aux bailleurs de fonds pour renforcer l’entreprenariat</h3>
            <div className='area-section_customers'>
                {
                    customers.map((customer, index) => {
                        return <div className='customer' key={index}>
                            <img src={customer.logo} alt={customer.name} width='300' height='150' />
                            <p className='country'>{customer.country}</p>
                            <p className='description'>{customer.description}</p>
                        </div>
                    })
                }
            </div>
        </>
    )
}

const container = document.querySelector('[data-component="backers"]')
if (container) {
    createRoot(container).render(<Backers />)
}
