<?php

namespace UserBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;


class AdminController extends FOSRestController
{
    public function indexAction()
    {
        return $this->render('UserBundle:Admin:admin.html.twig', array(
            // ...
        ));
    }

    public function veterinairesGridAction()
    {
        $veterinaires = array();

        $veterinaire1 = [
            'id' => 'id1',
            'nom' => 'nom 1',
            'prenom' => 'prenom 1',
            'description' => 'description 1',
            'adresse' => 'adresse 1',
            'site' => "www.site1.com",
            'tel' => 'tel 1',
            'gouvernorat' => 'gouvernorat 1',
            'delegation' => 'delegation 1',
        ];

        $veterinaire2 = [
            'id' => 'id2',
            'nom' => 'nom 2',
            'prenom' => 'prenom 2',
            'description' => 'description 2',
            'adresse' => 'adresse 2',
            'site' => "www.site2.com",
            'tel' => 'tel 2',
            'gouvernorat' => 'gouvernorat 2',
            'delegation' => 'delegation 2',
        ];

        $veterinaire3 = [
            'id' => 'id3',
            'nom' => 'nom 3',
            'prenom' => 'prenom 3',
            'description' => 'description 3',
            'adresse' => 'adresse 3',
            'site' => "www.site3.com",
            'tel' => 'tel 3',
            'gouvernorat' => 'gouvernorat 3',
            'delegation' => 'delegation 3',
        ];

        $veterinaires[0] = $veterinaire1;
        $veterinaires[1] = $veterinaire2;
        $veterinaires[2] = $veterinaire3;

        return new JsonResponse($veterinaires);
    }

    public function deleteVeterinairesGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function promeneursGridAction()
    {
        $promeneurs = array();

        $promeneur1 = [
            'id' => 'id1',
            'nom' => 'nom 1',
            'prenom' => 'prenom 1',
            'desc' => 'desc 1',
            'adresse' => 'adresse 1',
            'tel' => 'tel 1',
            'prix' => '100',
            'gouvernorat' => 'gouvernorat 1',
            'delegation' => 'delegation 1',
        ];

        $promeneur2 = [
            'id' => 'id2',
            'nom' => 'nom 2',
            'prenom' => 'prenom 2',
            'desc' => 'desc 2',
            'adresse' => 'adresse 2',
            'tel' => 'tel 2',
            'prix' => '200',
            'gouvernorat' => 'gouvernorat 2',
            'delegation' => 'delegation 2',
        ];

        $promeneur3 = [
            'id' => 'id3',
            'nom' => 'nom 3',
            'prenom' => 'prenom 3',
            'desc' => 'desc 3',
            'adresse' => 'adresse 3',
            'tel' => 'tel 3',
            'prix' => '300',
            'gouvernorat' => 'gouvernorat 3',
            'delegation' => 'delegation 3',
        ];

        $promeneurs[0] = $promeneur1;
        $promeneurs[1] = $promeneur2;
        $promeneurs[2] = $promeneur3;

        return new JsonResponse($promeneurs);
    }

    public function deletePromeneursGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function dresseursGridAction()
    {
        $dresseurs = array();

        $dresseur1 = [
            'id' => 'id1',
            'nom' => 'nom 1',
            'prenom' => 'prenom 1',
            'description' => 'description 1',
            'adresse' => 'adresse 1',
            'tel' => 'tel 1',
            'gouvernorat' => 'gouvernorat 1',
            'delegation' => 'delegation 1',
        ];

        $dresseur2 = [
            'id' => 'id2',
            'nom' => 'nom 2',
            'prenom' => 'prenom 2',
            'description' => 'description 2',
            'adresse' => 'adresse 2',
            'tel' => 'tel 2',
            'gouvernorat' => 'gouvernorat 2',
            'delegation' => 'delegation 2',
        ];

        $dresseur3 = [
            'id' => 'id3',
            'nom' => 'nom 3',
            'prenom' => 'prenom 3',
            'description' => 'description 3',
            'adresse' => 'adresse 3',
            'tel' => 'tel 3',
            'gouvernorat' => 'gouvernorat 3',
            'delegation' => 'delegation 3',
        ];

        $dresseurs[0] = $dresseur1;
        $dresseurs[1] = $dresseur2;
        $dresseurs[2] = $dresseur3;

        return new JsonResponse($dresseurs);
    }

    public function deleteDresseursGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function hotelsGridAction()
    {
        $hotels = array();

        $hotel1 = [
            'id' => 'id1',
            'nom' => 'nom 1',
            'site' => 'www.site1.com',
            'description' => 'description 1',
            'adresse' => 'adresse 1',
            'tel' => 'tel 1',
            'prix' => '100',
            'gouvernorat' => 'gouvernorat 1',
            'delegation' => 'delegation 1',
        ];

        $hotel2 = [
            'id' => 'id2',
            'nom' => 'nom 2',
            'site' => 'www.site2.com',
            'description' => 'description 2',
            'adresse' => 'adresse 2',
            'tel' => 'tel 2',
            'prix' => '200',
            'gouvernorat' => 'gouvernorat 2',
            'delegation' => 'delegation 2',
        ];

        $hotel3 = [
            'id' => 'id3',
            'nom' => 'nom 3',
            'site' => 'www.site3.com',
            'description' => 'description 3',
            'adresse' => 'adresse 3',
            'tel' => 'tel 3',
            'prix' => '300',
            'gouvernorat' => 'gouvernorat 3',
            'delegation' => 'delegation 3',
        ];

        $hotels[0] = $hotel1;
        $hotels[1] = $hotel2;
        $hotels[2] = $hotel3;

        return new JsonResponse($hotels);
    }

    public function deleteHotelsGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function magasinsGridAction()
    {
        $magasins = array();

        $magasin1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
            'mail' => 'mail@mail.mzil1',
            'description' => 'description 1',
            'adresse' => 'adresse 1',
            'tel' => 'tel 1',
            'site' => 'www.site1.com',
            'gouvernorat' => 'gouvernorat 1',
            'delegation' => 'delegation 1',
        ];

        $magasin2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
            'mail' => 'mail@mail.mzil2',
            'description' => 'description 2',
            'adresse' => 'adresse 2',
            'tel' => 'tel 2',
            'site' => 'www.site2.com',
            'gouvernorat' => 'gouvernorat 2',
            'delegation' => 'delegation 2',
        ];

        $magasin3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
            'mail' => 'mail@mail.mzil3',
            'description' => 'description 3',
            'adresse' => 'adresse 3',
            'tel' => 'tel 3',
            'site' => 'www.site3.com',
            'gouvernorat' => 'gouvernorat 3',
            'delegation' => 'delegation 3',
        ];

        $magasins[0] = $magasin1;
        $magasins[1] = $magasin2;
        $magasins[2] = $magasin3;

        return new JsonResponse($magasins);
    }

    public function deleteMagasinsGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function associationsGridAction()
    {
        $associations = array();

        $association1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
            'vocation' => 'vocation 1',
            'description' => 'description 1',
            'adresse' => 'adresse 1',
            'tel' => 'tel 1',
            'site' => 'www.site1.com',
            'mail' => 'mail@mail.mail1',
        ];

        $association2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
            'vocation' => 'vocation 2',
            'description' => 'description 2',
            'adresse' => 'adresse 2',
            'tel' => 'tel 2',
            'site' => 'www.site2.com',
            'mail' => 'mail@mail.mail2',
        ];

        $association3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
            'vocation' => 'vocation 3',
            'description' => 'description 3',
            'adresse' => 'adresse 3',
            'tel' => 'tel 3',
            'site' => 'www.site3.com',
            'mail' => 'mail@mail.mail3',
        ];

        $associations[0] = $association1;
        $associations[1] = $association2;
        $associations[2] = $association3;

        return new JsonResponse($associations);
    }

    public function deleteAssociationsGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function articlesGridAction()
    {
        $articles = array();

        $article1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
            'date' => 'date 1',
            'contenu' => 'contenu 1',
        ];

        $article2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
            'date' => 'date 2',
            'contenu' => 'contenu 2',
        ];

        $article3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
            'date' => 'date 3',
            'contenu' => 'contenu 3',
        ];

        $articles[0] = $article1;
        $articles[1] = $article2;
        $articles[2] = $article3;

        return new JsonResponse($articles);
    }

    public function validateArticlesGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function forumsGridAction()
    {
        $forums = array();

        $forum1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
        ];

        $forum2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
        ];

        $forum3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
        ];

        $forums[0] = $forum1;
        $forums[1] = $forum2;
        $forums[2] = $forum3;

        return new JsonResponse($forums);
    }

    public function deleteForumsGridAction($id)
    {
        if ($id != null)
        {
            return new Response('SUCCESS');
        }
        else
        {
            return new Response('ERROR');
        }
    }

    public function associationsChartAction()
    {
        $associations = array();

        $association1 = [
            'id' => 'id1',
            'category' => 'Association 1',
            'value' => 53.8,
            'color' => '#9de219',
        ];
        $association2 = [
            'id' => 'id2',
            'category' => 'Association 2',
            'value' => 16.1,
            'color' => '#90cc38',
        ];
        $association3 = [
            'id' => 'id3',
            'category' => 'Association 3',
            'value' => 11.3,
            'color' => '##068c35',
        ];
        $association4 = [
            'id' => 'id4',
            'category' => 'Association 4',
            'value' => 5.2,
            'color' => '#004d38',
        ];
        $association5 = [
            'id' => 'id5',
            'category' => 'Association 5',
            'value' => 9.6,
            'color' => '#006634',
        ];
        $association6 = [
            'id' => 'id6',
            'category' => 'Association 6',
            'value' => 3.6,
            'color' => '#033939',
        ];

        $associations[0] = $association1;
        $associations[1] = $association2;
        $associations[2] = $association3;
        $associations[3] = $association4;
        $associations[4] = $association5;
        $associations[5] = $association6;

        return new JsonResponse($associations);
    }

    public function meilleursDresseursChartAction()
    {
        $dresseurs = array();

        $dresseur1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
        ];

        $dresseur2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
        ];

        $dresseur3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
        ];

        $dresseurs[0] = $dresseur1;
        $dresseurs[1] = $dresseur2;
        $dresseurs[2] = $dresseur3;

        return new JsonResponse($dresseurs);
    }

    public function dresseursParRegionChartAction()
    {
        $dresseurs = array();

        $dresseur1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
        ];

        $dresseur2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
        ];

        $dresseur3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
        ];

        $dresseurs[0] = $dresseur1;
        $dresseurs[1] = $dresseur2;
        $dresseurs[2] = $dresseur3;

        return new JsonResponse($dresseurs);
    }

    public function annoncesParCategorieChartAction()
    {
        $annonces = array();

        $annonce1 = [
            'id' => 'id1',
            'titre' => 'titre 1',
        ];

        $annonce2 = [
            'id' => 'id2',
            'titre' => 'titre 2',
        ];

        $annonce3 = [
            'id' => 'id3',
            'titre' => 'titre 3',
        ];

        $annonces[0] = $annonce1;
        $annonces[1] = $annonce2;
        $annonces[2] = $annonce3;

        return new JsonResponse($annonces);
    }

    public function boxesAction()
    {
        $veterinaires = 45;
        $annonces = 200;
        $inscriptions = 44;
        $magasins = 25;

        $box = [
            'veterinaires' => $veterinaires,
            'annonces' => $annonces,
            'inscriptions' => $inscriptions,
            'magasins' => $magasins,
        ];

        return new JsonResponse($box);
    }

}
