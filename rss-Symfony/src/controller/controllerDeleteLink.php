<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelChecker as MChecker;
use App\Model\ModelEdDel as MEdDel;

class ControllerDeleteLink
{

	public function getDeleteLink($request, $response)
	{
        $mChecker = new MChecker;
        
        if ($mChecker->checkLogin($request)){
            $mEdDel = new MEdDel;
            $currentDate = $mEdDel->getDeleteById();
            return new RedirectResponse('/cabinet');
		} else {
			return $mChecker->answerLogin($response);
		}
	}

}