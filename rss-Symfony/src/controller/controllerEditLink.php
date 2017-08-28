<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelChecker as MChecker;
use App\Model\ModelCabinet as MCabinet;
use App\Model\ModelEdDel as MEdDel;

class ControllerEditLink
{

	public function getEditLink($request, $response)
	{
        $mChecker = new MChecker;
        
        if ($mChecker->checkLogin($request)){
            $mEdDel = new MEdDel;
            $currentDate = $mEdDel->getDataById();
            
            $contentView = 'viewEditLink.php';
            return $response->setContent(include 'src/view/viewTemplate.php');
		} else {
			return $mChecker->answerLogin($response);
		}
	}

    public function postEditLink($request)
	{
		$mChecker = new MChecker;
		
		if ($mChecker->checkLogin($request)){
			$mCabinet = new MCabinet;

			$id = $request->request->get('id');
			$editName = $request->request->get('editName');
            $editLink = $request->request->get('editLink');

			$mCabinet->setUpdate($id, $editName, $editLink);
			
			return new RedirectResponse('/cabinet');
		} else {
			return new RedirectResponse('/login');
		}
	}

}