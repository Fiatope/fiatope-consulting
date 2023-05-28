<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class AdminCrudController extends AbstractCrudController
{
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Administrateur')
            ->setEntityLabelInPlural('Administrateurs')
            ->setPaginatorPageSize(10)
            ->setEntityPermission('ROLE_ADMIN')
            ->showEntityActionsInlined()
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $instance = $this->getContext()->getEntity()->getInstance();

        if ($this->isGranted('ROLE_ADMIN')) {
            yield TextField::new('username', 'Nom d\'utilisateur');
            yield ChoiceField::new('roles', 'Rôles')
                ->allowMultipleChoices()
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Éditeur' => 'ROLE_EDITOR'
                ])
                ->setDisabled($this->getUser() === $instance)
            ;

            if (
                $pageName === Crud::PAGE_NEW
                || (
                    $pageName === Crud::PAGE_EDIT
                    && $this->getUser() === $instance
                )
            ) {
                yield TextField::new('password')
                    ->setFormType(RepeatedType::class)
                    ->setFormTypeOptions([
                        'type' => PasswordType::class,
                        'first_options' => [
                            'label' => $pageName === Crud::PAGE_NEW ? 'Mot de passe' : 'Modifier le mot de passe',
                            'attr' => [
                                'min' => '6',
                                'autocomplete' => 'new-password'
                            ]
                        ],
                        'second_options' => ['label' => 'Répéter le mot de passe'],
                        'mapped' => false,
                    ])
                    ->setRequired(false)
                ;
            }
        }
    }

    public function createNewFormBuilder(
        EntityDto $entityDto,
        KeyValueStore $formOptions,
        AdminContext $context
    ): FormBuilderInterface {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        return $this->changePasswordEventListener($formBuilder);
    }

    public function createEditFormBuilder(
        EntityDto $entityDto,
        KeyValueStore $formOptions,
        AdminContext $context
    ): FormBuilderInterface {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        return $this->changePasswordEventListener($formBuilder);
    }

    private function changePasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->changePassword());
    }

    private function changePassword(): \Closure
    {
        return function ($event) {
            $form = $event->getForm();
            if (!$form->isValid()) {
                $form->addError(new FormError('Formulaire invalide'));
                return;
            }

            $password = $form->get('password')->getData();
            if (empty($password)) {
                return;
            }

            elseif (mb_strlen($password) < 6) {
                $form->addError(new FormError('Le mot de passe doit contenir au minimum 6 caractères.'));
                return;
            }

            /** @var PasswordAuthenticatedUserInterface $user */
            $user = $this->getUser();
            $hash = $this->hasher->hashPassword($user, $password);
            $form->getData()->setPassword($hash);
        };
    }
}
