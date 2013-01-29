<?php

namespace Combro2k\Bundle\SGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Combro2kSGalleryBundle:Default:index.html.twig', array('name' => $name));
    }
}
