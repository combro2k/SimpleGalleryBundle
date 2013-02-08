<?php

namespace Combro2k\Bundle\SimpleGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
     * @return Array
     *
     * @Template()
     */
    public function indexAction()
    {
        $this->appRootDir = $this->get('kernel')->getRootDir();
        $this->finder = new Finder();

        $directories = array(
            sprintf('%s/%s', $this->appRootDir, '../web/uploads/gallery')
        );

        $finder = $this->finder->in($directories)->files()->sortByModifiedTime();
        $files = array();
        foreach ($finder as $file) {
            $files[] = $file;
        }

        return array(
            'gallery' => $files
        );
    }
}
