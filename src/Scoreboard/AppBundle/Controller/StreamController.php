<?php

namespace Scoreboard\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StreamController extends Controller
{
    /**
     * @Route("/stream")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
