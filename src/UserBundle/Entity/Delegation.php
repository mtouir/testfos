<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delegation
 *
 * @ORM\Table(name="delegation", indexes={@ORM\Index(name="id_gov", columns={"id_gov"})})
 * @ORM\Entity
 */
class Delegation
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
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_gov", type="integer", nullable=false)
     */
    private $idGov;


}

