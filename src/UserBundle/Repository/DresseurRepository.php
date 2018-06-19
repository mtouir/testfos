<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/06/2018
 * Time: 15:56
 */

namespace UserBundle\Repository;


class DresseurRepository extends \Doctrine\ORM\EntityRepository
{
    public function findRdesseur($nom)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT d from UserBundle:Dresseur d WHERE d.nom = :nom')
            ->setParameter('nom', $nom);
        return $query->getResult();
    }

    public function finddresseurs($entitygouvernorat)
    {
        $query = $this->getEntityManager()->createQuery('SELECT d , g  FROM UserBundle:Dresseur d JOIN UserBundle:Gouvernorat g  WHERE d.idGouv=:id')
            ->setParameter('id', $entitygouvernorat);
            return $query->getResult();


    }
}