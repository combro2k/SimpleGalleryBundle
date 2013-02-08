<?php

namespace Combro2k\Bundle\SGalleryBundle\Controller;

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

    public function __construct()
    {
        $this->appRootDir = $this->get('kernel')->getRootDir();
        $this->finder = new Finder();
    }

    /**
     * @param $name
     *
     * @return Response
     */
    public function indexAction($name)
    {
        $directories = array(
            sprintf('%s/%s', $this->appRootDir, 'web/gallery')
        );

        $files = $this->finder->in($directories)->files()->sortByModifiedTime();

        var_dump($files);

        return $this->render('Combro2kSGalleryBundle:Default:index.html.twig', array('name' => $name));
    }
}
