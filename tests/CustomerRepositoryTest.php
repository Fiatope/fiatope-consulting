<?php

namespace App\Tests;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CustomerRepositoryTest extends KernelTestCase
{
    private ?EntityManager $em = null;

    /**
     * Before :
     * - update the .env.test file with the database url
     * - create the database : php bin/console doctrine:database:create --env=test
     * - create the schema : php bin/console doctrine:schema:create --env=test.
     *
     * @throws OptimisticLockException
     * @throws ORMException
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        /* @var EntityManager $this->em */
        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        // Populate the database with test data
        $customer1 = (new Customer())
            ->setName('Customer 1')
            ->setCountry('Country 1')
            ->setLogo('logo1.png')
            ->setTypes(['type1', 'type2'])
        ;

        $customer2 = (new Customer())
            ->setName('Customer 2')
            ->setCountry('Country 2')
            ->setLogo('logo2.png')
            ->setTypes(['type1'])
        ;

        $customer3 = (new Customer())
            ->setName('Customer 3')
            ->setCountry('Country 3')
            ->setLogo('logo3.png')
            ->setTypes(['type1', 'type2', 'type3'])
        ;

        $this->em->persist($customer1);
        $this->em->persist($customer2);
        $this->em->persist($customer3);
        $this->em->flush();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->em?->close();
        $this->em = null;
    }

    public function testFindByTypes(): void
    {
        // Create the customer repository object and call the findByTypes method
        /** @var CustomerRepository $customerRepository */
        $customerRepository = $this->em?->getRepository(Customer::class);

        dump(
            $customerRepository->findAll(),
            $customerRepository->findByTypes(['type1']),
        );

        // Make assertions on the result
        $result = $customerRepository->findByTypes(['type3']);
        $this->assertCount(1, $result);

        $result = $customerRepository->findByTypes(['type2']);
        $this->assertCount(2, $result);

        $result = $customerRepository->findByTypes(['type1', 'type2']);
        $this->assertCount(3, $result);
    }
}
