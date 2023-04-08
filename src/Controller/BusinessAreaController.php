<?php

namespace App\Controller;

use App\Entity\BusinessArea;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BusinessAreaController extends AbstractController
{
    #[Route('/{slug}', name: 'business_area')]
    public function show(BusinessArea $area): Response
    {
        return $this->render('business_area/show.html.twig', [
            'area' => $area,
        ]);
    }
}
