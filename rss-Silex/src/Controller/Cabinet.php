<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use App\Model\SourceMapper;
use App\Model\SourceEntity;

class Cabinet
{
    public static function _before(Request $request, Application $app)
    {
        $logged = $request->getSession()->get('logged');
        if (! $logged) $app->abort(403, 'Forbidden.');
    }

    public function getIndex(Request $request, Application $app)
    {
        $mapper = new SourceMapper($app['db']);
        $sources = $mapper->getSources();

        $app['view.name'] = 'cabinet';
        return $app['view']->data(['sources' => $sources])->render();
    }

    public function postAddSource(Request $request, Application $app)
    {
        $data = $request->request->all();

       $constraint = new Assert\Collection([
            'name' => new Assert\Length(['min' => 6]),
            'source_link' => [new Assert\NotNull(), new Assert\Url()],
            'rss_feed_link' => [new Assert\NotNull(), new Assert\Url()],
        ]);

        $errors = $app['validator']->validate($data, $constraint);

        if (count($errors) > 0) {
            foreach ($errors as $error){
                $err = $error->getPropertyPath().' '.$error->getMessage()."\n";
                $app->abort(406, $err);
            }
        } else {
            $getHeaders = @get_headers($data['rss_feed_link']);
            
            if (substr($getHeaders[0], 9, 3) == 200){
                $source = new SourceEntity($data);
                $mapper = new SourceMapper($app['db']);
                $mapper->save($source);

                return $app->redirect('/cabinet');
            } else {
                $app->abort(404, 'Not Found');
            }
        }
    }

    public function postDisableSource(Request $request, Application $app, $id)
    {
        $mapper = new SourceMapper($app['db']);
        $data = $mapper->getSourceById($id);
        $data['is_active'] = ! $data['is_active'];

        $source = new SourceEntity($data);
        $mapper->save($source);

        return $app->redirect('/cabinet');
    }
}
