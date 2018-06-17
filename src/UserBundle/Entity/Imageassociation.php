<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageassociation
 *
 * @ORM\Table(name="imageassociation", indexes={@ORM\Index(name="id_association", columns={"id_association"})})
 * @ORM\Entity
 */
class Imageassociation
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
     * @ORM\Column(name="id_association", type="integer", nullable=false)
     */
    private $idAssociation;


}

