<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelCabinet as MCabinet;
use App\Model\ModelChecker as MChecker;

class ControllerCabinet
{

	public function getCabinet($request, $response)
	{
        $mChecker = new MChecker;
		
		if ($mChecker->checkLogin($request)){
			$mCabinet = new MCabinet;
			$contentView = 'viewCabinet.php';
			return $response->setContent(include 'src/view/viewTemplate.php');
		} else {
			return $mChecker->answerLogin($response);
		}
	}

	public function postCabinet($request)
	{
		//for the future
	}

}
