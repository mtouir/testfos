<?php
/**
 * Created by PhpStorm.
 * User: asus-pc
 * Date: 28-03-2018
 * Time: 16:28
 */

namespace UserBundle\Controller;
use UserBundle\Entity\AnnonceAnimal;
use UserBundle\Entity\Image;
use UserBundle\Form\AnnonceAnimalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AnnonceAnimauxController extends Controller
{
    public function listeAction(Request $request)
    {


        $query = $this->get('doctrine.orm.entity_manager')->createQuery('SELECT a.id,a.titre,a.prix,i.path From UserBundle:AnnonceAnimal a LEFT JOIN UserBundle:Image i  WHERE a.id=i.idAnnonce GROUP BY i.idAnnonce');


        $em=$this->getDoctrine()->getManager();
        $animaux = $em->getRepository("UserBundle:AnnonceAnimal")->findAll();
        $images = $em->getRepository("UserBundle:AnnonceAnimal")->getfrontimage();
        $result =array("animal" => $animaux,
            "images"=>$images);
        $listanimaux  = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            6/*nbre d'éléments par page*/
        );

        return $this->render('UserBundle:AnnonceAnimaux:liste.html.twig', array("animaux" => $listanimaux,
            "images"=>$images
            // ...
        ));
    }
    public function MesAnnonceAction(Request $request)
    {

        $user=$this->getUser();
        $query = $this->get('doctrine.orm.entity_manager')->createQuery('SELECT a.id,a.titre,a.prix,i.path From UserBundle:AnnonceAnimal a LEFT JOIN UserBundle:Image i  WHERE a.id=i.idAnnonce GROUP BY i.idAnnonce');


        $em=$this->getDoctrine()->getManager();
        $animaux = $em->getRepository("UserBundle:AnnonceAnimal")->findAll();
        $images = $em->getRepository("UserBundle:AnnonceAnimal")->getfrontimage();
        $result =array("animal" => $animaux,
            "images"=>$images);
        $listanimaux  = $this->get('knp_paginator')->paginate(
            $query,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            6/*nbre d'éléments par page*/
        );
        return $this->render('UserBundle:AnnonceAnimaux:MesAnnonce.html.twig', array(
            "animaux" => $listanimaux,
            "images"=>$images
        ));


    }


    public function detailsAction(Request $request)
    {



        $id= $request->get('identifiant');
        $query = $this->get('doctrine.orm.entity_manager')->createQuery('SELECT i.path From UserBundle:Image i  WHERE i.idAnnonce=:p')
            ->setParameter('p',$id);
        $image = $query->getResult();
        $em=$this->getDoctrine()->getManager();
        $animal=$em->getRepository('UserBundle:AnnonceAnimal')->find($id);

        return $this->render('UserBundle:AnnonceAnimaux:details.html.twig',
            array("animal" => $animal,"image"=>$image));
    }

    public function deposerAnnonceAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $last_entity = $em->getRepository("UserBundle:AnnonceAnimal")->findLastAnnonce();

        $session = $this->get('session');
        $a = $last_entity->getId();
        $session->set('lastid',  $last_entity->getId()+1);

        $AnnonceAnimal = new AnnonceAnimal();
        $form = $this->createForm(AnnonceAnimalType::class,$AnnonceAnimal);
        $form->handleRequest($request); //controler notre requete
        if ($form->isValid())
        {
            $isimage =$em->getRepository("UserBundle:AnnonceAnimal")->newimage($last_entity->getId()+1);

            if ($isimage==null)
            {
            $image = new Image();
            $image->setPath("/www/ZanimauxV2/web/uploads/defaultzanimaux.jpg");
            $image->setIdAnnonce($last_entity->getId()+1);
                $em->persist($image);
                $em->flush();

            }
            $em=$this->getDoctrine()->getManager();
            $em->persist($AnnonceAnimal);
            $em->flush();

            return new Response ('Annonce Ajouter');
        }


        return $this->render('UserBundle:AnnonceAnimaux:deposerAnnonce.html.twig',array("form"=>$form->createView()));

    }

}