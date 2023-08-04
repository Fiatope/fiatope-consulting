import React from 'react'
import { createRoot } from 'react-dom/client'

const AccelerationPrograms = () => {
    return <>
        <h3>Programmes d’accéleration d'entrepreneurs vers le financement</h3>
        <div className='article_1'>
            <hgroup>
                <h4>Fiatope Accéleration</h4>
                <h5>Booste ton financement</h5>
            </hgroup>
            <div className='timeline'>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 1
                            <br/>Capitaliser
                        </h6>
                        <p>
                            <ul>
                                <li>Votre profil d’entrepreneur</li>
                                <li>Vos motivations</li>
                                <li>Vos valeurs</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 2
                            <br/>Renforcer
                        </h6>
                        <p>
                            <ul>
                                <li>Le volet innovation</li>
                                <li>Le Business Model Canvas/SWOT</li>
                                <li>Le Business Plan</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 3
                            <br/>Concrétiser
                        </h6>
                        <p>
                            <ul>
                                <li>Bootstrapper</li>
                                <li>Définir son MVP</li>
                                <li>Dérouler son Business Plan</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 4
                            <br/>Gérer
                        </h6>
                        <p>
                            <ul>
                                <li>Le Lean StartUp</li>
                                <li>Opérer au quotidien et prioriser</li>
                                <li>« Recruter »</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 5
                            <br/>Conquérir
                        </h6>
                        <p>
                            <ul>
                                <li>Définir son impact social</li>
                                <li>Définir sa marque et son branding</li>
                                <li>Construire son réseau d'influence</li>
                                <li>Mettre en place son audience</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Session 6
                            <br/>Mesurer et Agir
                        </h6>
                        <p>
                            <ul>
                                <li>Ses premiers chiffres</li>
                                <li>Evaluer ses ressources et forces en présence</li>
                                <li>Définir un plan de développement</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <div className='item'>
                    <div className='item-content'>
                        <h6 className='item-title'>
                            Le présentiel
                        </h6>
                        <p>
                            Il permettra de réaborder les sujets vus en
                            session, mais aussi d'aller plus loin en couvrant
                            notamment l'introduction au crowdfunding et
                            d'autres sujets comme l'art de pitcher, le
                            renforcement de son leadership...
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Fiatope funding readiness</h4>
            <img className='img' src='/assets/img/acceleration-1.svg' alt='Fiatope Funding Readiness' />
            <p className='text'>
                Le programme de préparation à l'investissement de Fiatope Consulting contient 10 items.
                <ul>
                    <li>challenger la vision de l'entrepreneur</li>
                    <li>renforcer la connaissance du marché</li>
                    <li>raffiner de la proposition de valeur et le modèle économique</li>
                    <li>challenger la capacité de l'équipe à répondre aux enjeux</li>
                    <li>Soutenir la rédaction d'un Business Plan convaincant et réaliste</li>
                    <li> mettre en visibilité des forces et opportunités</li>
                    <li>consolider les projections financières au regard des éléments précédents</li>
                    <li>émettre les considérations juridiques en vue d'une ouverture de capital</li>
                    <li>évaluer la moralité de l'équipe vis-à-vis des questions de formalisation, d'intégrité morale, d'éthique</li>
                    <li>élaborer les premiers éléments de valorisation financière de l'entreprise</li>
                </ul>
            </p>
        </div>
        <div className='area-section_article'>
            <h4 className='title'>Fiatope accès au financement</h4>
            <img src='/assets/img/acceleration-2.svg' alt='Fiatope accès au financement' className='img' />
            <p className='text'>
                Nous avons également une formation qui éclaire des entrepreneurs et porteurs de projet sur l'accès au financement. Nous abordons les points
                suivants :
                <ul>
                    <li>Valider votre réel besoin à être financé</li>
                    <li>Comprendre les conditions sous lesquelles votre projet peut être candidat à un financement</li>
                    <li>Explorer les les différents mécanismes de financement et évaluer la compatibilité de chacun avec votre projet ou son état de maturité</li>
                    <li>Le Financement participatif</li>
                    <li>Comprendre ce qu'attend un financeur/investisseur</li>
                </ul>
            </p>
        </div>
    </>
}

const container = document.querySelector('[data-component="acceleration"]')
if (container) {
    createRoot(container).render(<AccelerationPrograms />)
}
