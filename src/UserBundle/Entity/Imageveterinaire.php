<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageveterinaire
 *
 * @ORM\Table(name="imageveterinaire", indexes={@ORM\Index(name="id_veterinaire", columns={"id_veterinaire"})})
 * @ORM\Entity
 */
class Imageveterinaire
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
     * @ORM\Column(name="id_veterinaire", type="integer", nullable=false)
     */
    private $idVeterinaire;


}

