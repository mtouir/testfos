<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagetransporteur
 *
 * @ORM\Table(name="imagetransporteur", indexes={@ORM\Index(name="id_transporteur", columns={"id_transporteur"})})
 * @ORM\Entity
 */
class Imagetransporteur
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
     * @ORM\Column(name="id_transporteur", type="integer", nullable=false)
     */
    private $idTransporteur;


}

