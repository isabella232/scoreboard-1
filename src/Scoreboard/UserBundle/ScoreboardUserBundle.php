<?php

namespace Scoreboard\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ScoreboardUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
