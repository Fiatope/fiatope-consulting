import React from 'react'
import { createRoot } from 'react-dom/client'

const Coaching = () => {
    return <>
        <div className='area-section_article'>
            <h4 className='title'>Management d’équipe</h4>
            <img src='/assets/img/coaching-1.svg' alt='Management d’équipe' className='img' />
            <p className='text'>
                Forts de nos expériences de Managers, nous avons construit une formation très pratique, en 30 topics, qui plonge le Manager ou le futur Manager au cœur des problématiques qu'il ou elle a à adresser, qu'il s'agisse de développement des collaborateurs, de gestion de la motivation, d'animation d'équipe, de recrutement, de team building, d'explication du sens des décisions...
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Gestion de projets agiles</h4>
            <img src='/assets/img/coaching-2.svg' alt='Gestion de projets agiles' className='img' />
            <p className='text'>
                Cette formation aborde la gestion de projet dans une approche nouvelle qui privilégie la prise en compte régulière de l'environnement du projet pour revoir les objectifs, introduit à l'utilisation d'outils récents comme Trello pour faciliter le management de son projet et insiste sur la capacité à évaluer des ressources et les apprécier au regard de l'ambition du projet
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Transformation agile</h4>
            <img src='/assets/img/coaching-3.svg' alt='Transformation agile' className='img' />
            <p className='text'>
                Cette formation décortique les principes de l'agilité en entreprise et permet aux participants de comprendre pourquoi il est important de devenir agile et d'où on part pour mettre en place cette agilité. Elle permet également de se familiariser avec SAFE, un des principaux frameworks de la transformation agile et de comprendre comment il peut s'adapter à son contexte particulier. Enfin, l'agilité est abordée de façon à montrer qu'il s’agit avant tout de bon sens et de rationalité
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Développement professionnel</h4>
            <img src='/assets/img/coaching-4.svg' alt='Développement professionnel' className='img' />
            <p className='text'>
                Une des clés de la réussite professionnelle est la capacité à s’améliorer sans cesse à la fois sur un plan personnel et sur un plan professionnel.
                <br/>Au cours de cette formation nous abordons des sujets comme la connaissance de soi, de ses aspirations, de ses motivations profondes, de ses valeurs, mais aussi de mieux travailler avec les autres et évoluer professionnellement en abordant d'autres aspects comme l'efficacité, l'importance d'avoir un réseau, d'améliorer ses relations inter-personnelles, de savoir communiquer, développer son leadership.
            </p>
        </div>
    </>
}

const container = document.querySelector('[data-component="coaching"]')
if (container) {
    createRoot(container).render(<Coaching />)
}
