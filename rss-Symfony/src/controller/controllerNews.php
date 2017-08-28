<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelNews as MNews;

class ControllerNews
{

	public function getNews($request, $response)
	{
                $mNews = new MNews;
                $contentView = 'viewNews.php';
                return $response->setContent(include 'src/view/viewTemplate.php');
	}

}
