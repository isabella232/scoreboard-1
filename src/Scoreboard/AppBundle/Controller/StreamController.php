<?php

namespace Scoreboard\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scoreboard\UserBundle\Entity\User;
use Scoreboard\AppBundle\Validator\ScoreValidator;
use Scoreboard\AppBundle\Entity\Score;


class StreamController extends Controller
{
    /**
     * @Route("/stream", name="stream")
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$users = $em->getRepository('ScoreboardUserBundle:User')->findAll();
    	$points = $em->getRepository('ScoreboardAppBundle:Score')->getStream();
    	$scoreboard = $em->getRepository('ScoreboardAppBundle:Score')->getScoreboard();
        return array(
        	'users' => $users,
        	'points' => $points,
        	'scoreboard' => $scoreboard
        );
    }

    /**
     * @Route("/stream/score/add", name="stream_score_add")
     * @Template()
     */
    public function scoreAddAction(Request $request)
    {
        if($request->getMethod() != 'POST') {
            return array();
        }

    	$em = $this->getDoctrine()->getManager();
    	$userRepository = $em->getRepository('ScoreboardUserBundle:User');
    	$validator = new ScoreValidator();
    	$parameters = array(
    		'points' =>  $request->request->get('points'),
    		'user' => $userRepository->findOneByUsername($request->request->get('user'))
    	);

        if(! $validator->isValid($parameters)) {
			$flashBag = $this->get('session')->getFlashBag();
			foreach($validator->getErrors() as $error) {
				$flashBag->add('error', $error);
			}
            return $this->redirect($this->generateUrl('stream_score_add'));
		}

		// save
		$score = new Score();
		$score->setPoints((int)$parameters['points']);
		$score->setGivenTo($parameters['user']);
		$score->setGivenBy($this->getUser());
		$em->persist($score);
		$em->flush();
		$this->get('session')->getFlashBag()->add('success', 'form.score.success');

        return $this->render(
            'ScoreboardAppBundle::refresh.iframe.html.twig',
            array()
        );
    }
}
