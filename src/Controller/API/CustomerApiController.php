<?php

namespace App\Controller\API;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('api/customer')]
class CustomerApiController extends AbstractController
{
    public function __construct(private readonly CustomerRepository $customerRepository)
    {
    }

    #[Route('/', name: 'api_customer_all')]
    public function getAll(Request $request): Response
    {
        $types = $request->query->get('types');
        if ($types) {
            $types = explode(',', $types);
            $customers = $this->customerRepository->findBy(['types' => $types]);
        } else {
            $customers = $this->customerRepository->findAll();
        }

        // Extract and filter the country, description, logo, and name fields from array<Customer>
        $filteredCustomers = array_map(function ($customer) {
            $filteredCustomer = [];
            $filteredCustomer['name'] = $customer->getName();
            $filteredCustomer['description'] = $customer->getDescription();
            $filteredCustomer['country'] = $customer->getCountry();
            $filteredCustomer['logo'] = 'uploads/img/' . ($customer->getLogo() ?? '');

            return $filteredCustomer;
        }, $customers);

        return $this->json($filteredCustomers);
    }
}
