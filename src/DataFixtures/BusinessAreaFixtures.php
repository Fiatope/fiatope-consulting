<?php

namespace App\DataFixtures;

use App\Entity\BusinessArea;
use App\Entity\BusinessAreaSection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BusinessAreaFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            BusinessAreaSectionFixtures::class,
        ];
    }
    public function load(ObjectManager $manager): void
    {
        $sections = $manager->getRepository(BusinessAreaSection::class)->findAll();

        $area1 = (new BusinessArea())
            ->setName('Entrepreneuriat et financement')
            ->setSlug('entrepreneuriat-et-financement')
            ->setDescription(
                '[Soutenir les bailleurs de fonds](#section_1) au sein de programmes de renforcement de capacité des écosystèmes
                entrepreneuriaux sur les sujets de financement participatif et de financement d’amorçage en Afrique.
                <br/>[Développer des programmes d’accélération d’entrepreneurs](#section_2) en diaspora et sur le continent, vers la
                digitalisation et le financement de leur projet.
                <br/>[Intervenir dans des cursus de formation de niveau Master](#section_3) sur les sujets d’entrepreneuriat et de
                financement de projets.'
            )
            ->setImage('entrepreneuriat-et-financement.svg')
            ->setFaIcon('fa-solid fa-building-columns')
            ->setSection1($sections[0] ?? null) // Bailleurs de fonds
            ->setSection2($sections[1] ?? null) // Programmes d'accélération
            ->setSection3($sections[2] ?? null) // Interventions académiques
        ;

        $area2 = (new BusinessArea())
            ->setName('Transformation digitale')
            ->setSlug('transformation-digitale')
            ->setDescription(
                '[Conseiller des entreprises sur leur transformation digitale](#section_1), les sensibiliser sur les gains d’aller
                vers le digital et conduire pour eux des projets digitaux.
                <br/>[Intervenir dans des cursus de niveau Master](#section_1) sur les sujets de transformation digitale et agile.'
            )
            ->setImage('transformation-digitale.svg')
            ->setFaIcon('fa-solid fa-laptop-file')
            ->setSection1($sections[3] ?? null) // Conseils en transformation digital
            ->setSection2($sections[2] ?? null) // Interventions académiques
        ;

        $area3 = (new BusinessArea())
            ->setName('Opérateurs mobiles')
            ->setSlug('operateurs-mobiles')
            ->setDescription(
                '[Accompagner les opérateurs mobiles en Afrique](#section_1) dans la mise en place de projets transverses
                d\'innovation. Sur le paiement digital, la transformation digitale et la construction de hubs
                d’innovation.'
            )
            ->setImage('operateurs-mobiles.svg')
            ->setFaIcon('fa-solid fa-mobile-screen-button')
            ->setSection1($sections[4] ?? null) // Conseils aux opérateurs mobile
            ->setSection2($sections[5] ?? null) // Programmes digital
        ;

        $area4 = (new BusinessArea())
            ->setName('Performance en entreprise')
            ->setSlug('performance-en-entreprise')
            ->setDescription(
                'Coacher des professionnels d’entreprise sur de nombreuses thématiques et domaines :
                - Management d’équipe
                - Gestion de projet digital
                - Transformation agile
                - Développement personnel
                - Préparation au recrutement'
            )
            ->setImage('performance-en-entreprise.svg')
            ->setFaIcon('fa-solid fa-chart-pie')
            ->setSection1($sections[6] ?? null) // Coaching d'entreprises
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
