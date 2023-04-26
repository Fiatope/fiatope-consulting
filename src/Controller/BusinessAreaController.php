<?php

namespace App\Controller;

use App\Entity\BusinessArea;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class BusinessAreaController extends AbstractController
{
    /**
     * @param BusinessArea|null $area
     * @return Response
     */
    #[Route('/{slug}', name: 'business_area')]
    public function show(?BusinessArea $area = null): Response
    {
        if (!$area) throw new NotFoundHttpException();

        return $this->render('business_area/show.html.twig', [
            'area' => $area,
        ]);
    }
}
