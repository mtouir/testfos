<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagemagasin
 *
 * @ORM\Table(name="imagemagasin", indexes={@ORM\Index(name="id_magasin", columns={"id_magasin"})})
 * @ORM\Entity
 */
class Imagemagasin
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
     * @ORM\Column(name="id_magasin", type="integer", nullable=false)
     */
    private $idMagasin;


}

