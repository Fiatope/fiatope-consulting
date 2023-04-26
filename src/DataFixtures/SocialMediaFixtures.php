<?php

namespace App\DataFixtures;

use App\Entity\SocialMedia;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class SocialMediaFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $social1 = (new SocialMedia())
            ->setName('facebook')
            ->setLink('https://fr-fr.facebook.com/');

        $social2 = (new SocialMedia())
            ->setName('linkedin')
            ->setLink('https://fr.linkedin.com/');

        $manager->persist($social1);
        $manager->persist($social2);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['dev'];
    }
}
