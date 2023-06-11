import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import Customers from '../components/Customers'

const DigitalTransformation = () => {
    const [customers, setCustomers] = useState([])
    useEffect(() => {
        fetch('api/customer/all?types=digital')
            .then((res) => res.json())
            .then((data) => {
                setCustomers(data)
            })
    }, [])

    return <>
        <div className='area-section_article'>
            <hgroup className='title'>
                <h4>Cursus entrepreneur</h4>
                <h5>Il adresse 10 objectifs</h5>
            </hgroup>
            <img src='/assets/img/transformation-1.svg' alt='Cursus entrepreneur' className='img' />
            <p className='text'>
                Il s'agit de permettre aux entrepreneurs du numérique
                <ol>
                    <li>de penser leurs applications</li>
                    <li>de les développer</li>
                    <li>de les faire connaître de leurs clients potentiels</li>
                    <li>de convertir ces prospects en clients</li>
                    <li>Faire évoluer ces applications</li>
                    <li>de gérer leurs équipes et les projets</li>
                    <li>d'exploiter les données recueillies par l'exploitation
                    des applications pour améliore les performances</li>
                    <li>de gérer administrativement, comptablement et
                    juridiquement leur activité</li>
                    <li>de comprendre et mettre en pratique la finance
                    digitale</li>
                    <li>de comprendre les enjeux de l'intelligence artificielle</li>
                </ol>
            </p>
        </div>
        <div className='area-section_article'>
            <hgroup className='title'>
                <h4>Cursus pouvoirs publics</h4>
                <h5>Il adresse 5 enjeux et problématiques</h5>
            </hgroup>
            <img src='/assets/img/transformation-2.svg' alt='Cursus pouvoirs publics' className='img' />
            <p className='text'>
                Dont la compréhension va permettre aux décideurs
                d'orienter les politiques publiques.
                <ol>
                    <li>Développement de services numériques</li>
                    <li>Vulgarisation du digital auprès du grand public</li>
                    <li>Renforcement des entreprises du numérique</li>
                    <li>Développement de l'Intelligence Artificielle et
                        d'autres évolutions récentes</li>
                    <li>Finance digitale</li>
                </ol>
            </p>
        </div>
        <div className="area-section_customers">
            <Customers customers={customers}/>
        </div>
    </>
}

const container = document.querySelector('[data-component="digital-transformation"]')
if (container) {
    createRoot(container).render(<DigitalTransformation />)
}
