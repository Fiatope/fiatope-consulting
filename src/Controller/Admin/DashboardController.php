<?php

namespace App\Controller\Admin;

use App\Entity\Address;
use App\Entity\BusinessArea;
use App\Entity\BusinessAreaSection;
use App\Entity\ContactMessage;
use App\Entity\Customer;
use App\Entity\SocialMedia;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private string $app_name = '')
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(BusinessAreaCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->app_name)
            ->setFaviconPath('assets/img/logo-min.svg')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Revenir au site', 'fa fa-home', 'home');

        yield MenuItem::section('Gestion du contenu');
        yield MenuItem::linkToCrud('Aires d\'interventions', 'fas fa-network-wired', BusinessArea::class);
        yield MenuItem::linkToCrud('Sections', 'fas fa-puzzle-piece', BusinessAreaSection::class);
        yield MenuItem::linkToCrud('Clients et Partenaires', 'fas fa-handshake-simple', Customer::class);

        yield MenuItem::section('Messages');
        yield MenuItem::linkToCrud('Messages reçus', 'fas fa-envelope', ContactMessage::class);

        yield MenuItem::section('CMS');
        // admins
        yield MenuItem::linkToCrud('Adresses', 'fas fa-location-dot', Address::class);
        yield MenuItem::linkToCrud('Réseaux sociaux', 'far fa-thumbs-up', SocialMedia::class);
    }
}
