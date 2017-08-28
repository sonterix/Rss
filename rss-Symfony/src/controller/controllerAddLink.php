<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelLink as MLink;
use App\Model\ModelChecker as MChecker;

class ControllerAddLink
{

	public function getAddLink($request, $response)
	{
        $mChecker = new MChecker;
        
        if ($mChecker->checkLogin($request)){
            $contentView = 'viewAddLink.php';
            return $response->setContent(include 'src/view/viewTemplate.php');
		} else {
			return $mChecker->answerLogin($response);
		}
	}

    public function postAddLink($request)
    {
        $mChecker = new MChecker;
		
        if ($mChecker->checkLogin($request)){
            $nameLink = $request->request->get('nameLink');
            $addLink = $request->request->get('addLink');

            $mLink = new MLink;
            $mLink->putLink($nameLink, $addLink);
            
            return new RedirectResponse('/cabinet');
        } else {
            return $mChecker->answerLogin($response);
		}
    }

}

