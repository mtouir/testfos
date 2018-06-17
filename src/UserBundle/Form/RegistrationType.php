<?php
// src/AppBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'roles', ChoiceType::class, [
                    'choices' => [
                        'ROLE_ADMIN' => 'Administrateur',
                        'ROLE_USER' => 'Utilisateur',
                        'ROLE_VETERINAIRE' => 'Vétérinaire',
                        'ROLE_DRESSEUR' => 'Dresseur',
                        'ROLE_PROMENEUR' => 'Promeneur',
                        'ROLE_ASSOCIATION' => 'Association',
                        'ROLE_HOTEL' => 'Hôtel'],
                    'multiple' => true,
                ]
            );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}