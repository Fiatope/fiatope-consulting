import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import InlineCustomers from '../components/InlineCustomers'

const MobileAdvices = () => {
    const [customers, setCustomers] = useState([])
    useEffect(() => {
        fetch('api/customer/all?types=mobile')
            .then((res) => res.json())
            .then((data) => {
                setCustomers(data)
            })
    }, [])

    return <>
        <div className='area-section_article'>
            <h4 className='title'>Projets transverses d’innovation</h4>
            <img src='/assets/img/mobile-1.svg' alt='Projets transverses d’innovation' className='img' />
            <p className='text'>
                Nous intervenons auprès des équipes de l’opérateur mobile et animons/pilotons des projets ou des programmes stratégiques d’innovation marché ou de transformation interne.
                <br/>Nous apportons notre grosse expérience de direction de projets télécom.
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Paiement mobile</h4>
            <img src='/assets/img/mobile-2.svg' alt='Paiement mobile' className='img' />
            <p className='text'>
                Le paiement mobile représente pour les opérateurs mobiles en Afrique un axe majeur de croissance.
                <br/>Nous aidons les équipes de finance mobile à déployer des services digitaux et en rupture, de manière à maintenir ou établir leur leadership sur le marché. Nous apportons notre rigueur opérationnelle aux équipes.
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Mise en place de Hubs d’innovation</h4>
            <img src='/assets/img/mobile-3.svg' alt='Mise en place de Hubs d’innovation' className='img' />
            <p className='text'>
                Il est pertinent pour les opérateurs de se positionner au sein des écosystèmes entrepreneuriaux pour susciter le développement de relais de croissance qui s’appuient sur leur assets (réseau, API…) et apporter leur contribution au rayonnement entrepreneurial du pays d’implantation. Nous apportons notre expérience d’accélérateur.
            </p>
        </div>
        <div className='article_1'>
            <p>Accompagner les opérateurs mobiles en Afrique dans la mise en place de projets transverses d'innovation.</p>
            <InlineCustomers customers={customers}/>
        </div>
    </>
}

const container = document.querySelector('[data-component="mobile-advices"]')
if (container) {
    createRoot(container).render(<MobileAdvices />)
}
