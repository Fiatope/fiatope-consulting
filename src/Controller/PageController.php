<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(priority: 1)]
class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(CustomerRepository $customerRepository): Response
    {
        $customers = $customerRepository->findAll();

        return $this->render('page/home.html.twig', [
            'customers' => $customers
        ]);
    }

    #[Route('/nous-contacter', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig');
    }
}
