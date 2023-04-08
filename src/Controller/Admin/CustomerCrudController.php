<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CustomerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('country');
        yield TextField::new('description');
        yield ChoiceField::new('types')
            ->allowMultipleChoices()
            ->setChoices([
                'Université' => 'college',
                'Bailleur de fonds' => 'backer',
                'Opérateur mobile' => 'mobile',
                'Transformation digitale' => 'digital'
            ]);
        yield ImageField::new('logo')
            ->setBasePath('/uploads/img')
            ->setUploadedFileNamePattern('[slug]-[uuid].[extension]')
            ->hideOnForm()
        ;
        yield TextField::new('imageFile', 'Logo du partenaire')
            ->setFormType(VichImageType::class)
            ->onlyOnForms()
        ;
    }

}
