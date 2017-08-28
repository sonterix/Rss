<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class ControllerContact
{

	public function getContact($request, $response)
	{
        $contentView = 'viewContact.php';
        return $response->setContent(include 'src/view/viewTemplate.php');
	}

}
