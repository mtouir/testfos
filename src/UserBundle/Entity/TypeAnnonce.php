<?php
/**
 * Created by PhpStorm.
 * User: marwensabri
 * Date: 18/06/2018
 * Time: 05:22
 */

namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class TypeAnnonce
 * @ORM\Entity
 */

class TypeAnnonce
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}