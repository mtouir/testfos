<?php
/**
 * Created by PhpStorm.
 * User: marwensabri
 * Date: 19/06/2018
 * Time: 16:39
 */

namespace AppBundle\EventListener;
use Doctrine\Common\Persistence\ObjectManager;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use UserBundle\Entity\AnnonceAnimal;
use UserBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UploadListener
{
    /**
     * @var ObjectManager
     */
    private $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function onUpload(PostPersistEvent $event)
    {

        $wholenum = $this->om->getRepository("UserBundle:AnnonceAnimal")->findLastAnnonce();
        //echo "khkh".$wholenum;

        $response = $event->getResponse();
        $request = $event->getRequest();
        //$id = $request->get('id');
        $file = $event->getFile();
        $object = new Image();
        $object->setIdAnnonce(($wholenum->getId()+1));
        $object->setPath($file->getPathName());
        $this->om->persist($object);
        $this->om->flush();


        $response['success'] = true;
        return $response;
    }
}