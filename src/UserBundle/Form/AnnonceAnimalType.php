<?php

namespace UserBundle\Form;

use UserBundle\Entity\TypeAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnnonceAnimalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        //return new Response('hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh');
        $builder
            ->add('TypeAnnonce',EntityType::class,array(
                'label' => 'Catégorie ',
                'attr' => array('style' => 'width: 200px'),'class'=>'ProjectZanimauxBundle:TypeAnnonce','choice_label'=>'nom','multiple'=>false,))

            //->add('type')
            ->add('datenaissance',null,array(
                'label' => 'Date de naissance ',
                'attr' => array('style' => 'width: 200px')))
            ->add('identification',null,array(
                'label' => ' Numéro identification',
                'attr' => array('style' => 'width: 200px')))
            /*->add('nombre',NumberType::class, array( 'required'   => true,
                // ...
                'invalid_message' => 'You entered an invalid value, it should include %num% letters',
                'invalid_message_parameters' => array('%num%' => 6),))*/
            ->add('nombre',null,array(
                'label' => 'Nombre animaux dans la portée  ',
                'attr' => array('style' => 'width: 200px')))
            ->add('sexe', ChoiceType::class,array(
                'label' => ' Sexe animal',
                'attr' => array('style' => 'width: 200px'),
                'choices' => array(
                    'Male' => 'Male',
                    'Femmel' => 'Femmel'

                )



            ))
            ->add('genealogique',null,array(
                'label' => ' Inscription de animal à un livre généalogique (couchez si oui)',
                'attr' => array('style' => 'width: 200px')))
            ->add('race',null,array(
                'label' => ' Race animal',
                'attr' => array('style' => 'width: 200px')))
            ->add('pelage', ChoiceType::class,array(
                'label' => ' Pelage animal',
                    'attr' => array('style' => 'width: 200px'),
                'choices' => array(

                    'Court' => 'Court',
                    'Mi-long' => 'Mi-long',
                    'Long' => 'long',
                ), 'data' => ''

            ))
            ->add('titre',null, array(
                'label' => ' Titre annonce',
                'attr' => array('style' => 'width: 200px')))
            ->add('text',TextareaType::class,array(
                'label' => ' Text de description',
                'attr' => array('style' => 'width: 500px')))
            ->add('duree', ChoiceType::class, array(
                'label' => ' Duree  annonce',
                'attr' => array('style' => 'width: 200px'),
                'empty_data' => new \DateTime('+3 month'),
                'placeholder' => 'Choisir une duree',
                'choices' => array(
                    '3 mois' => new \DateTime('+3 month'),
                    '6 mois' => new \DateTime('+6 month'),
                    '12 mois' => new \DateTime('+12 week'),
                )))
            ->add('prix',null,array(
        'label' => ' Prix ',
        'attr' => array('style' => 'width: 200px')))
            ->add('ville',null,array(
                'label' => ' Ville ',
                'attr' => array('style' => 'width: 200px')))
            ->add('postal',null,array(
                'label' => ' Code Postal',
                'attr' => array('style' => 'width: 200px')))

            ->add('Valider',SubmitType::class);

        /* */
           // ->add('type', ChoiceType::class, array('choices'=>array()));

      /* $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function(FormEvent $event){
                // Get the parent form
                $form = $event->getForm();

                // Get the data for the choice field
                $data = $event->getData()['TypeAnnonce'];
                //$data = $event->getData();
                //$sport = $data->getTitre();

                // Collect the new choices
                echo "test".$data ;

                if($data == 3 ) {
                    $form->add('datenaissance');

                }
                // Add the field again, with the new choices :
                //$form->add('type', ChoiceType::class, array('choices'=>$choices));
            }
        );

      /*
      formModifier = function (FormInterface $form, TypeAnnonce $sport = null) {
            //$positions = null === $sport ? array() : $sport->getAvailablePositions();

            /*$form->add('position', EntityType::class, array(
                'class' => 'AppBundle:Position',
                'placeholder' => '',
                'choices' => $positions,
            ));

        $form->add('datenaissance');

    };

$builder->addEventListener(
FormEvents::PRE_SET_DATA,
    function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                echo "tetetet".$data->getTypeAnnonce();

                $formModifier($event->getForm(), $data->getTypeAnnonce());
            }
);

$builder->get('TypeAnnonce')->addEventListener(
    FormEvents::POST_SUBMIT,
    function (FormEvent $event) use ($formModifier) {
        // It's important here to fetch $event->getForm()->getData(), as
        // $event->getData() will get you the client data (that is, the ID)
        $sport = $event->getForm()->getData();

        // since we've added the listener to the child, we'll have to pass on
        // the parent to the callback functions!
        $formModifier($event->getForm()->getParent(), $sport);
    }
);




      $formEditModel = function (FormInterface $form, TypeAnnonce $mark = null) {
            if (null === $mark) {
                $form->add('model', 'choice', array(
                    'disabled' => 'disabled'
                ));
            }
        };

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event)
        use ($formEditModel) {
            $data = $event->getData();

            $formEditModel($event->getForm(), $data);
        });

        $builder->get('type')->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event)
        use ($formEditModel) {
            $mark = $event->getForm()->getData();
            $formEditModel($event->getForm()->getParent(), $mark);
        });


            $builder->get('type')->addEventListener(FormEvents::POST_SET_DATA,
                function (FormEvent $event){

                $form = $event->getForm();
                $type=$form->getData();

                    if ($type ['type']) {
                        return $this->redirectToRoute("listeAnimaux");

                        $form->getParent()->remove('pelage');

                    }
                }
                );
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $type = $data->gettype();
                 if ($type->getNom == "Oiseaux") {
                     $form->remove('pelage');

                 }


                $form->add('position', EntityType::class, array(
                    'class' => 'AppBundle:Position',
                    'placeholder' => '',
                    'choices' => $positions,
                ));
            }
        ); */
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\AnnonceAnimal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'project_zanimauxbundle_annonceanimal';
    }


}
