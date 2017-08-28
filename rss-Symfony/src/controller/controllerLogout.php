<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class ControllerLogout
{

        public function getLogout($request, $response)
        {
                $session = $request->getSession();
                $session->invalidate();
                return new RedirectResponse('/login');
        }

}
