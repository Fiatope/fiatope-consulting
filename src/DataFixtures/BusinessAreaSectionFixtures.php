<?php

namespace App\DataFixtures;

use App\Entity\BusinessAreaSection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class BusinessAreaSectionFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $components = [
            'Bailleurs de fonds' => 'backers',
            'Coaching d\'entreprises' => 'coaching',
            'Interventions académiques' => 'academic',
            'Conseils en transformation digital' => 'digital-advices',
            'Conseils aux opérateurs mobile' => 'mobile-advices',
            'Programmes digital' => 'digital-programs',
            'Programmes d\'accélération' => 'programs'
        ];

        $i = 0;
        foreach ($components as $name => $component) {
            $i++;
            $section =
                (new BusinessAreaSection())
                ->setName($name)
                ->setDescription(
                    'Lörem ipsum titågon tissa hexaponde, mäjär, radioaktiv. Difyssade ol, dektiga lyvis: intramädiliga.
                    Nepora planebelt: anamäst jobbtorg jydenera. Behaligt dons tång, att mikrossa. Mät fukövis, har
                    normcore.'
                )
                ->setComponent($component)
                ->setImage(sprintf('area-section-%s.jpg', $i))
            ;
            $manager->persist($section);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['dev'];
    }
}
