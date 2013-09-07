<?php
namespace Scoreboard\AppBundle\Twig;

class MenuExtension extends \Twig_Extension
{
	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction('isActiveMenuItem', array($this, 'isActiveMenuItem'))
		);
	}

	public function isActiveMenuItem($item)
	{
		if($item == 'stream') {
			return ' class=active ';
		}
		return;
	}

	public function getName()
	{
		return 'menu_extension';
	}
}