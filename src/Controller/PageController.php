<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(priority: 1)]
class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('page/home.html.twig');
    }

    #[Route('/nous-contacter', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig');
    }
}
