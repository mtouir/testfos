<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dresseur
 *
 * @ORM\Table(name="dresseur")
 * @ORM\Entity
 */
class Dresseur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false)
     */
    private $idImage;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_gouv", type="integer", nullable=false)
     */
    private $idGouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_deleg", type="integer", nullable=false)
     */
    private $idDeleg;


}

