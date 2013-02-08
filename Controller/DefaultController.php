<?php

namespace Combro2k\Bundle\SimpleGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;

class DefaultController extends Controller
{
    /**
     * @var Finder $finder
     */
    protected $finder;

    /**
     * @var string $appRootDir
     */
    protected $appRootDir;

    /**
     * @param $name
     *
     * @return Response
     */
    public function indexAction($name)
    {
        $this->appRootDir = $this->get('kernel')->getRootDir();
        $this->finder = new Finder();

        $directories = array(
            sprintf('%s/%s', $this->appRootDir, '../web/uploads/gallery')
        );

        $files = $this->finder->in($directories)->files()->sortByModifiedTime();

        var_dump($files);

        return $this->render('Combro2kSimpleGalleryBundle:Default:index.html.twig', array('name' => $name));
    }
}
