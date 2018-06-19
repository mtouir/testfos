<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 21/04/2018
 * Time: 22:37
 */

namespace UserBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UserBundle\Entity\Dresseur;
use UserBundle\Entity\Gouvernorat;
use UserBundle\Form\DresseurType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use UserBundle\Form\GouvernoratType;


class DresseurController extends Controller
{

    public function showAction(Request $request)
    {

            $em = $this->getDoctrine()->getManager();
            $dresseurs = $em->getRepository("UserBundle:Dresseur")->findAll();

            /**
             * @var $paginator \Knp\Component\Pager\Paginator
             */
            $paginator = $this->get('knp_paginator');
            $result = $paginator->paginate(
                $dresseurs,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 6)
            );

            return $this->render("UserBundle:Dresseur:show.html.twig", array(
                    'dresseurs' => $result,


                )


            );

    }

    public function editAction(Request $request)
    {
        {
            $id = $request->get('id');
            $em = $this->getDoctrine()->getManager();
            $Dresseur = $em->getRepository("UserBundle:Dresseur")->find($id);
            $form = $this->createForm(DresseurType::class, $Dresseur);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Dresseur);
                $em->flush();
                return $this->redirectToRoute("dresseur_home");
            }


            return $this->render("UserBundle:Dresseur:edit.html.twig", array(
                "Form"=>$form->createView()
            ));
        }

    }
    /*
     * @Return Symfony\Component\HttpFoundation\Request
     *
     * @Route("/dresseur/",name='dresseur_home")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function addAction(Request $request)
    {
        $Dresseur = new Dresseur();
        $form = $this->createForm(DresseurType::class, $Dresseur);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $Dresseur->uploadProfilePicture();
            $em->persist($Dresseur);
            $em->flush();
            return $this->redirectToRoute("dresseur_home");
        }
        return $this->render("UserBundle:Dresseur:add.html.twig", array(
            "Form" => $form->createView()
        ));
    }

    public function rechercherAction(Request $request)
    {
        $nom = $request->get("nom");
        $em = $this->getDoctrine()->getManager();
        $dresseurs=$em->getRepository('UserBundle:Dresseur')->findRdesseur($nom);
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result=$paginator->paginate(
            $dresseurs,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)
        );
        return $this-> render("UserBundle:Dresseur:show.html.twig", array(
                'dresseurs' => $result,


            )


        );

    }
    public function deleteAction()
    {


    }

    public function detailsAction(Dresseur $dresseur )
    {


        return $this->render("UserBundle:Dresseur:details.html.twig",
            array(
                'dresseurs'=>$dresseur
            ));


    }
public function exportAction()
{

   $em=$this->getDoctrine()->getManager();
   $Dresseurs=$em->getRepository('UserBundle:Dresseur')->findAll();

    $writer = $this->container->get('egyg33k.csv.writer');
    $csv = $writer::createFromFileObject(new \SplTempFileObject());
    $csv->insertOne(['Nom']);
    $csv->insertOne(['Prenom']);

    foreach ($Dresseurs as $dresseurs) {
        $csv->insertOne([$dresseurs->getNom() , $dresseurs->getPrenom()],';');
    }
        $csv->output('Dresseur.csv');
        die;
}
    public function jsondresseurAction()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository("UserBundle:Dresseur")
            ->findAll();

        $serializer= new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($articles);
        return new JsonResponse($formatted);
    }

public function searchAction(Request $request)
{
    $Dresseur = new Dresseur();
    $form = $this->createForm(DresseurType::class, $Dresseur);
    $form->handleRequest($request);
    if ($form->isValid()) {

        $em = $this->getDoctrine()->getManager();

        $Dresseur->uploadProfilePicture();
        $em->persist($Dresseur);
        $em->flush();
        return $this->redirectToRoute("dresseur_home");
    }
    return $this->render("UserBundle:Dresseur:search.html.twig", array(
        "Form" => $form->createView()
    ));
}

}