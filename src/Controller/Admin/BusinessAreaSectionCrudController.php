<?php

namespace App\Controller\Admin;

use App\Entity\BusinessAreaSection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BusinessAreaSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusinessAreaSection::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Section')
            ->setEntityLabelInPlural('Sections')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield TextareaField::new('description');
        yield ChoiceField::new('component')
            ->setChoices([
                'Bailleurs de fonds' => 'backers',
                'Programmes d\'accélération' => 'acceleration',
                'Interventions académiques' => 'academic',
                'Conseils en transformation digital' => 'digital-transformation',
                'Conseils aux opérateurs mobile' => 'mobile-advices',
                'Programmes digital' => 'digital-programs',
                'Coaching d\'entreprises' => 'coaching',
            ])
        ;
        yield ImageField::new('image')
            ->setBasePath('/uploads/img')
            ->setUploadedFileNamePattern('[slug]-[uuid].[extension]')
            ->hideOnForm()
        ;
        yield TextField::new('imageFile', 'Image de fond')
            ->setFormType(VichImageType::class)
            ->onlyOnForms()
        ;
    }
}
