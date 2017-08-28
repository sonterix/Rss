<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelChecker as MChecker;

class ControllerLogin
{

	public function getLogin($request, $response)
	{
        $mChecker = new MChecker;

		if ($mChecker->checkLogin($request)) {
			return new RedirectResponse('/cabinet');
		} else {
			$contentView = 'viewLogin.php';
			return $response->setContent(include 'src/view/viewTemplate.php');
		}
	}

	public function postLogin($request)
	{
		$login = $request->request->get('login');
        $password = $request->request->get('password');

		if ($login == 'root' && $password == 'toor') {
            $request->getSession()->set('logged', true);
            return new RedirectResponse('/cabinet');
        } else {
        	return new RedirectResponse('/login');
		}
	}

}
