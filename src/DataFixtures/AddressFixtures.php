<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $address1 = (new Address())
            ->setName('Fiatope Consulting')
            ->setStreet('4517 Washington Ave. Manchester')
            ->setCity('Kentucky')
            ->setCountry('France')
            ->setZipcode('39495')
            ->setPhone('+4065550120')
            ->setMail('jackson.graham@example.com')
        ;

        $address2 = (new Address())
            ->setName('Fiatope Consulting')
            ->setStreet('4517 Washington Ave. Manchester')
            ->setCity('Kentucky')
            ->setCountry('Cameroun')
            ->setZipcode('39495')
            ->setPhone('+4065550120')
            ->setMail('jackson.graham@example.com')
        ;

        $manager->persist($address1);
        $manager->persist($address2);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['dev'];
    }
}
