<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelChecker as MChecker;

class ControllerRegistration
{

	public function getRegistration($request, $response)
	{
		$mChecker = new MChecker;
		
		if ($mChecker->checkLogin($request)){
			return new RedirectResponse('/cabinet');
		} else {
			$contentView = 'viewrRgistration.php';
			return $response->setContent(include 'src/view/viewTemplate.php');
		}
	}

	public function postRegistration($request)
	{
		$name = $request->request->get('name');
		$login = $request->request->get('login');
		$password = $request->request->get('password');

		return new RedirectResponse('/login');
	}

}
