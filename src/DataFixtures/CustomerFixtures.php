<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $customer1 = (new Customer())
            ->setCountry('Rwanda')
            ->setDescription(
                'Mise en place d’une plateforme de paiement des frais de scolarité pour une école de développement web
                financée par la GIZ'
            )
            ->setLogo('GIZ.png')
            ->setTypes(['backer']);

        $customer2 = (new Customer())
            ->setCountry('Rwanda')
            ->setDescription(
                'Identifier les axes de renforcement de capacité de l’écosystème TECH dans le cadre du réchauffement des
                relation avec la France'
            )
            ->setLogo('ambassade-rwanda.png')
            ->setTypes(['backer']);

        $customer3 = (new Customer())
            ->setCountry('Mali')
            ->setDescription(
                'Renforcer les capacités des entrepreneurs, incubateurs et pouvoirs publics en financement participatif'
            )
            ->setLogo('banque-mondiale.png')
            ->setTypes(['backer']);

        $customer4 = (new Customer())
            ->setCountry('Afrique')
            ->setDescription(
                'Partage d’expérience avec les lauréats du Social and Inclusive Business Camp sur la mise en place d’une
                 activité entrepreneuriale de financement projets'
            )
            ->setLogo('AFD.png')
            ->setTypes(['backer']);

        $customer5 = (new Customer())
            ->setCountry('Cameroun')
            ->setDescription(
                'Accompagner 20 jeunes camerounais en situation de handicap à l’entrepreneuriat, sa digitalisation et
                son financement'
            )
            ->setLogo('FORIM.png')
            ->setTypes(['backer']);

        $customer6 = (new Customer())
            ->setCountry('Bénin')
            ->setDescription(
                'Accompagner une jeune entreprise dans la mise en place d’un écosystème et d’une plateforme de
                financement participatif pour les filières agricoles'
            )
            ->setLogo('enabel.png')
            ->setTypes(['backer']);

        $customer7 = (new Customer())
            ->setCountry('Rwanda')
            ->setDescription('Sensibilisation de l’équipe dirigeante sur les enjeux de la mise en place de POS online')
            ->setLogo('access-bank.png')
            ->setTypes(['digital']);

        $customer8 = (new Customer())
            ->setCountry('Cameroun')
            ->setDescription('Mise en place d’une direction des systèmes d’information pour l’Université')
            ->setLogo('universite-montagnes.png')
            ->setTypes(['college', 'digital']);

        $customer9 = (new Customer())
            ->setCountry('Côte d’Ivoire')
            ->setDescription('Offre de maitrise d’œuvre dans le cadre d’un appel d’offre')
            ->setLogo('HEMISPHERE.png')
            ->setTypes(['digital']);

        $customer10 = (new Customer())
            ->setCountry('Cameroun, RDC')
            ->setDescription(
                'Accompagnement de mise en œuvre avec les directions Marketing et Technique de la stratégie
                d’innovation'
            )
            ->setLogo('orange.png')
            ->setTypes(['mobile']);

        $customer11 = (new Customer())
            ->setCountry('Rwanda')
            ->setDescription('Finance digitale')
            ->setLogo('cmu-africa.png')
            ->setTypes(['college']);

        $customer12 = (new Customer())
            ->setCountry('France')
            ->setDescription('Entrepreneuriat\nFinancement d’entreprise\nFinance digitale')
            ->setLogo('uca.png')
            ->setTypes(['college']);

        $manager->persist($customer1);
        $manager->persist($customer2);
        $manager->persist($customer3);
        $manager->persist($customer4);
        $manager->persist($customer5);
        $manager->persist($customer6);
        $manager->persist($customer7);
        $manager->persist($customer8);
        $manager->persist($customer9);
        $manager->persist($customer10);
        $manager->persist($customer11);
        $manager->persist($customer12);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['prod'];
    }
}
