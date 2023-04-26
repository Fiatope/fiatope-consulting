<?php

namespace App\Controller\Admin;

use App\Entity\SocialMedia;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocialMediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialMedia::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Réseau social')
            ->setEntityLabelInPlural('Réseaux sociaux');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom');
        yield TextField::new('link', 'Lien');
    }
}
