<?php

namespace App\Controller\Admin;

use App\Entity\BusinessArea;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BusinessAreaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusinessArea::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Aire d\'intervention')
            ->setEntityLabelInPlural('Aires d\'intervention')
            ->setSearchFields(['name', 'description'])
            ->setPaginatorPageSize(10)
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield SlugField::new('slug')->setTargetFieldName('name');
        yield TextField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->onlyOnForms()
        ;
        yield ImageField::new('image')
            ->setBasePath('/uploads/img')
            ->setUploadedFileNamePattern('[slug]-[uuid].[extension]')
            ->hideOnForm()
        ;

        yield TextareaField::new('description')
            ->setFormType(CKEditorType::class)
            ->hideOnIndex()
        ;
    }
}
