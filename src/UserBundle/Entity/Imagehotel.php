<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagehotel
 *
 * @ORM\Table(name="imagehotel", indexes={@ORM\Index(name="id_hotel", columns={"id_hotel"})})
 * @ORM\Entity
 */
class Imagehotel
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
     * @ORM\Column(name="id_hotel", type="integer", nullable=false)
     */
    private $idHotel;


}

