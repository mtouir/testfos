<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 06/05/2018
 * Time: 13:31
 */

namespace UserBundle\Repository;


class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllarticle()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a FROM UserBundle:Article a  ORDER BY a.date DESC '
            )
            ->getResult();
    }

    public function findarticle($categorie)
    {
        $query=$this->getEntityManager()
            ->createQuery('SELECT a from UserBundle:Article a WHERE a.categorie = :categorie')
            ->setParameter('categorie',$categorie);
        return $query->getResult();
    }
}