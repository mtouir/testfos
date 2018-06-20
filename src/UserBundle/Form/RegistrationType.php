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
                        'ROLE_ADMIN' => 'ROLE_ADMIN',
                        'ROLE_USER' => 'ROLE_USER',
                        'ROLE_VETERINAIRE' => 'ROLE_VETERINAIRE',
                        'ROLE_DRESSEUR' => 'ROLE_DRESSEUR',
                        'ROLE_PROMENEUR' => 'ROLE_PROMENEUR',
                        'ROLE_ASSOCIATION' => 'ROLE_ASSOCIATION',
                        'ROLE_HOTEL' => 'ROLE_HOTEL',
                        'ROLE_TRANSPORTEUR' => 'ROLE_TRANSPORTEUR'],
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