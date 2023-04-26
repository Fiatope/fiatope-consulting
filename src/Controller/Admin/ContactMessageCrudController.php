<?php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactMessageCrudController extends AbstractCrudController
{
    public function __construct(private EntityManagerInterface $em)
    {}

    public static function getEntityFqcn(): string
    {
        return ContactMessage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Message reçu')
            ->setEntityLabelInPlural('Messages reçus')
            ->setPaginatorPageSize(10)
            ->showEntityActionsInlined();
    }

    public function createIndexQueryBuilder(
        SearchDto        $searchDto,
        EntityDto        $entityDto,
        FieldCollection  $fields,
        FilterCollection $filters
    ): QueryBuilder {
        return parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters)
            ->orderBy('entity.received_at', 'DESC');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->disable(Action::NEW)
            ->add('index', Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === 'detail') {
            /** @var ContactMessage $msg */
            $msg = $this->getContext()->getEntity()->getInstance();
            $msg->setIsRead(true);
            $this->updateEntity($this->em, $msg);
        }

        yield TextField::new('name', 'Prénom - Nom');
        yield TextField::new('mail', 'Adresse e-mail');
        yield TextareaField::new('content', 'Message');
        yield DateTimeField::new('received_at', 'Reçu le')
            ->setFormat('d MMMM yyyy à hh:mm');
        yield BooleanField::new('is_read', 'Lu')->hideOnDetail();
    }
}
