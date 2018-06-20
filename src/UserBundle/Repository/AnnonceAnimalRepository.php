<?php
/**
 * Created by PhpStorm.
 * User: marwensabri
 * Date: 19/06/2018
 * Time: 20:33
 */

namespace UserBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

class AnnonceAnimalRepository extends EntityRepository
{
    public function newimage($id)
    {
        $query = $this->getEntityManager()->createQuery('SELECT i From UserBundle:Image i  WHERE i.idAnnonce = :t')
            ->setParameter('t',$id);
        return $query->getResult();

    }
    public function  findLastAnnonce ()


    {

        try {
            return $last_entity = $this->createQueryBuilder('m')
                ->select('e')
                ->from('UserBundle:AnnonceAnimal', 'e')
                ->orderBy('e.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    public function getfrontimage()
    {
        $query = $this->getEntityManager()->createQuery('SELECT i From UserBundle:Image i  GROUP BY i.idAnnonce ');
        return $query->getResult();
    }

    public function updateimage ($id)
    {







    /*$query2 = $this->getEntityManager()->createQuery('INSERT INTO  ProjectZanimauxBundle:Image i  VALUES (:p,:id)')
        ->setParameter('p',"/www/ZanimauxV2/web/uploads/defaultzanimaux.jpg")
         ->setParameter('id',$id+1);

    $query2->execute();$/



}

        $query = $this->getEntityManager()
            ->createQuery('UPDATE ProjectZanimauxBundle:Image m SET m.idAnnonce= :id WHERE m.idAnnonce = :t')
            ->setParameter('id',$id+1)
            ->setParameter('t',0);
        $query->execute();


        /*
        $qb = $this->createQueryBuilder();
        $q = $qb->update('ProjectZanimauxBundle:Image', 'i')
            ->set('i.idAnnonce', '?1')
            ->where('i.idAnnonce = ?2')
            ->setParameter(1, $id)
            ->setParameter(2, '0')

            ->getQuery();
        $p = $q->execute()*/
    }
}