<?php

namespace Scoreboard\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/user/autocomplete", name="user_autocomplete")
     * @Template()
     */
    public function autocompleteAction(Request $request)
    {
    	$name = $request->query->get('term');
    	$response = new JsonResponse();
    	if(null === $name || strlen($name) <= 2) {
    		$response->setData(array());
    		return $response;
    	}

    	$repository = $this->getDoctrine()->getManager()->getRepository('ScoreboardUserBundle:User');
    	$query = $repository->createQueryBuilder('u')
    		->select('u.username')
    		->where('u.username LIKE :username')
    		->andWhere('u.id != :currentUserId')
    		->setParameter('username', '%' . $name . '%')
    		->setParameter('currentUserId', $this->getUser()->getId())
    		->getQuery();

    	$result = array();
    	foreach($query->getResult() as $user) {
    		$result[] = $user['username'];
    	}
    	
    	$response->setData($result);
    	return $response;
    }
}
