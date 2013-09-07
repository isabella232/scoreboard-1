<?php
namespace Scoreboard\AppBundle\Validator;

class ScoreValidator
{
	protected $errors = array();

	public function isValid(array $parameters)
	{
		$this->validateScore($parameters);
		$this->validateUser($parameters);
		return 0 == count($this->errors);
	}

	public function getErrors()
	{
		return $this->errors;
	}

	protected function validateScore(array $parameters)
	{
		if(NULL !== $parameters['points'] && ! is_int((int) $parameters['points'])) {
			$this->errors[] = 'form.errors.score.points.required';
			return;
		}

		if(($parameters['points'] < -3 && $parameters['points'] > 3) || $parameters['points'] == 0) {
			$this->errors[] = 'form.errors.score.points.range';
		}
	}

	protected function validateUser(array $parameters)
	{
		if(null == $parameters['user'] || $parameters['user'] instanceof User) {
			$this->errors[] = 'form.errors.score.user.required';
		}
	}
}