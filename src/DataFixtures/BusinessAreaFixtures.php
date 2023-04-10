<?php

namespace App\DataFixtures;

use App\Entity\BusinessArea;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class BusinessAreaFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $area1 = (new BusinessArea())
            ->setName('Entrepreneuriat et financement')
            ->setSlug('entrepreneuriat-et-financement')
            ->setDescription(
                'Soutenir les bailleurs de fonds au sein de programmes de renforcement de capacité des écosystèmes
                entrepreneuriaux sur les sujets de financement participatif et de financement d’amorçage en Afrique.
                <br/>Développer des programmes d’accélération d’entrepreneurs en diaspora et sur le continent, vers la
                digitalisation et le financement de leur projet.
                <br/>Intervenir dans des cursus de formation de niveau Master sur les sujets d’entrepreneuriat et de
                financement de projets.'
            )
            ->setImage('entrepreneuriat-et-financement.svg')
            ->setFaIcon('fa-solid fa-building-columns')
        ;

        $area2 = (new BusinessArea())
            ->setName('Transformation digitale')
            ->setSlug('transformation-digitale')
            ->setDescription(
                'Conseiller des entreprises sur leur transformation digitale, les sensibiliser sur les gains d’aller
                vers le digital et conduire pour eux des projets digitaux.
                <br/>Intervenir dans des cursus de niveau Master sur les sujets de transformation digitale et agile.'
            )
            ->setImage('transformation-digitale.svg')
            ->setFaIcon('fa-solid fa-laptop-file')
        ;

        $area3 = (new BusinessArea())
            ->setName('Opérateurs mobiles')
            ->setSlug('operateurs-mobiles')
            ->setDescription(
                'Accompagner les opérateurs mobiles en Afrique dans la mise en place de projets transverses
                d\'innovation. Sur le paiementdigital, la transformation digitale et la construction de hubs
                d’innovation.'
            )
            ->setImage('operateurs-mobiles.svg')
            ->setFaIcon('fa-solid fa-mobile-screen-button')
        ;

        $area4 = (new BusinessArea())
            ->setName('Performance en entreprise')
            ->setSlug('performance-en-entreprise')
            ->setDescription(
                'Coacher des professionnels d’entreprise sur de nombreuses thématiques et domaines :
                <ul>
                    <li>Management d’équipe</li>
                    <li>Gestion de projet digital</li>
                    <li>Transformation agile</li>
                    <li>Développement personnel</li>
                    <li>Préparation au recrutement</li>
                </ul>'
            )
            ->setImage('performance-en-entreprise.svg')
            ->setFaIcon('fa-solid fa-chart-pie')
        ;

        $manager->persist($area1);
        $manager->persist($area2);
        $manager->persist($area3);
        $manager->persist($area4);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['prod'];
    }
}
