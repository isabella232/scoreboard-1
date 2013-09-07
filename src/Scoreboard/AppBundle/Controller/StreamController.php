<?php

namespace Scoreboard\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scoreboard\AppBundle\Validator\ScoreValidator;
use Scoreboard\AppBundle\Entity\Score;


class StreamController extends Controller
{
    /**
     * @Route("/stream", name="stream")
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
    	$em = $this->getDoctrine()->getManager();
    	$userRepository = $em->getRepository('ScoreboardUserBundle:User');

    	$validator = new ScoreValidator();
    	$parameters = array(
    		'points' =>  $request->request->get('points'),
    		'user' => $userRepository->find($request->request->get('user'))
    	);
    	$parameters['points'] = $request->request->get('points-sign') > 0 ? $parameters['points'] : -$parameters['points'];
		if(! $validator->isValid($parameters)) {
			$flashBag = $this->get('session')->getFlashBag();
			foreach($validator->getErrors() as $error) {
				$flashBag->add('error', $error);
			}
		} else {
			// save
			$score = new Score();
			$score->setPoints((int)$parameters['points']);
			$score->setGivenTo($parameters['user']);
			$score->setGivenBy($this->getUser());
			$em->persist($score);
			$em->flush();
			$this->get('session')->getFlashBag()->add('success', 'form.score.success');
		}
		return $this->redirect($this->generateUrl('stream'));
    }
}
