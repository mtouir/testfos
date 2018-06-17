<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageannonce
 *
 * @ORM\Table(name="imageannonce", indexes={@ORM\Index(name="id_annonce", columns={"id_annonce"})})
 * @ORM\Entity
 */
class Imageannonce
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
     * @ORM\Column(name="lien", type="string", length=500, nullable=false)
     */
    private $lien;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer", nullable=false)
     */
    private $idAnnonce;


}

