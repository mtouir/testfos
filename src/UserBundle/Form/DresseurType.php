<?php

namespace UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DresseurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('adresse')->add('description')->add('tel')->add('nomImage',HiddenType::class)
            ->add('idDeleg',EntityType::class ,array(
                'class'=>'UserBundle:Delegation',
                'choice_label'=>'libelle',
                'multiple'=>false
            ))
            ->add('idGouv', EntityType::class ,array(
                'class'=>'UserBundle:Gouvernorat',
                'choice_label'=>'libelle',
                'multiple'=>false
            ))
        ->add('file')
        ->add('Enregistrer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Dresseur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_dresseur';
    }


}
