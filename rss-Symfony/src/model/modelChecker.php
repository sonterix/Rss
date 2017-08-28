<?php

namespace App\Model;

class ModelChecker
{
	
	public function checkLogin($request)
	{
		if ($request->getSession()->has('logged', true)) {
            return true;
		} else {
			return false;
		}
	}

	public function answerLogin($response)
	{
		$response->setStatusCode('403');
		$response->setContent(include 'src/view/view403.php');
		return $response;
	}
	
}