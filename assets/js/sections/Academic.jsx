import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import Customers from '../components/Customers'

const Academic = () => {
    const [customers, setCustomers] = useState([])
    useEffect(() => {
        fetch('api/customer/all?types=college')
            .then((res) => res.json())
            .then((data) => {
                setCustomers(data)
            })
    }, [])

    return <>
        <h3>Interventions académiques : 3 secteurs</h3>
        <div className='area-section_article'>
            <h4 className="title">Financement des petites entreprises</h4>
            <img className='img' src="assets/img/academic-1.svg" alt="Financement des petites entreprises" width="500"
                 height="300" />
            <p className='text'>
                Nous abordons pendant cette formation tous les rouages du financement d'entreprises en amorçage c'est-à-dire
                avec une existence réduite (2 ou 3 ans).
                <br />Nous passons en revue tous les types de financement existants dans l'écosystème diaspora ou africain
                et discutons sur ceux qui sont adaptés aux participants.
                <br />Nous faisons un focus particulier sur le financement participatif particulièrement adapté aux
                contextes visés.
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className="title">Finance digitale</h4>
            <img className='img' src="assets/img/academic-2.svg" alt="Finance digitale" width="500" height="300" />
            <p className='text'>
                La finance digitale désigne l'ensemble des opérations qui permettent de financer l'économie et de
                payer/recevoir un paiement par le digital.
                <br />Cette formation passe en revue tous les mécanismes de la finance digitale et leurs enjeux aujourd'hui
                pour les acteurs économiques du Continent : la banque digitale, le paiement digital, le mobile Money le
                financement participatif, les cryptomonnaies et la blockchain...
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className="title">Entrepreneuriat</h4>
            <img className='img' src="assets/img/academic-3.svg" alt="Entrepreneuriat" width="500" height="300" />
            <p className='text'>
                Dans ce module nous familiarisons les étudiants avec la philosophie entrepreneuriale en prenant soin déjà de
                leur dire les qualités requises d’un entrepreneur et les exigences de ce type d’activité professionnelle.
                <br />Ensuite nous les emmenons à réfléchir sur ce que signifie entreprendre dans leur contexte particulier,
                celui du pays où ils se trouvent et en fonction des réalités économiques locales et de leurs capacités.
                <br />Nous pouvons aussi dédier ce module à de l’entrepreneuriat numérique.
            </p>
        </div>
        <h3>Interventions académiques</h3>
        <p>Nous intervenons dans de multiples universités en France et sur le continent.</p>
        <Customers customers={customers}/>
    </>
}

const container = document.querySelector('[data-component="academic"]')
if (container) {
    createRoot(container).render(<Academic />)
}
