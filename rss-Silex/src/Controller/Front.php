<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use App\Model\NewsMapper;
use App\Model\NewsEntity;

class Front
{
    public function getIndex(Request $request, Application $app)
    {
        $mapper = new NewsMapper($app['db']);
        $items = $mapper->getNews();

        $logged = $request->getSession()->get('logged');

        $app['view.name'] = 'index';
        return $app['view']->data(['items' => $items, 'logged' => $logged])->render();
        // return include '../templates/index.tpl.php';
    }
    
    public function getLogin(Request $request, Application $app)
    {
        $app['view.name'] = 'login';
        return $app['view']->render();
    }

    public function postLogin(Request $request, Application $app)
    {
        $validData = [
            'login' => $request->request->get('name'),
            'pass' => $request->request->get('pass'),
        ];

        $constraint = new Assert\Collection([
            'login' => [
                new Assert\Length([
                'min' => 3,
                'max' => 12,
                ]),
                new Assert\NotNull(),
            ],
            'pass' => [
                new Assert\Length(['min' => 3]),
                new Assert\NotNull(),                
            ],

        ]);

        $errors = $app['validator']->validate($validData, $constraint);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $err = $error->getPropertyPath().' '.$error->getMessage()."\n";
                $app->abort(403, $err);
            }
        } else {
            $session = $request->getSession();

            if ($validData['login'] == 'root' && $validData['pass'] == 'toor') {
                $session->set('logged', true);
                return $app->redirect('/cabinet');
            }

            return $app->redirect('/login');
        }
    }

    public function getLogout(Request $request, Application $app)
    {
        $session = $request->getSession();
        $session->clear();
        $session->invalidate();

        return $app->redirect('/');
    }
}
