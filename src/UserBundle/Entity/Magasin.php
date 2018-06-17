<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magasin
 *
 * @ORM\Table(name="magasin", indexes={@ORM\Index(name="id_gouv", columns={"id_gouv"}), @ORM\Index(name="id_deleg", columns={"id_deleg"})})
 * @ORM\Entity
 */
class Magasin
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
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=100, nullable=false)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_deleg", type="integer", nullable=false)
     */
    private $idDeleg;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_gouv", type="integer", nullable=false)
     */
    private $idGouv;


}

