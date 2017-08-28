<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();
$response = new Response;


$session = new Session;
$session->start();

$request->setSession($session);

$routes = new RouteCollection();

$routes->add('getNews', new Route('/', ['_controller' => 'App\Controller\ControllerNews@getNews'],
    [], [], '', [], ['GET']));
$routes->add('getLogin', new Route('/login', ['_controller' => 'App\Controller\ControllerLogin@getLogin'],
    [], [], '', [], ['GET']));
$routes->add('postLogin', new Route('/login', ['_controller' => 'App\Controller\ControllerLogin@postLogin'],
    [], [], '', [], ['POST']));
$routes->add('getRegistration', new Route('/registration', ['_controller' => 'App\Controller\controllerRegistration@getRegistration'],
    [], [], '', [], ['GET']));
$routes->add('postRegistration', new Route('/registration', ['_controller' => 'App\Controller\controllerRegistration@postRegistration'],
    [], [], '', [], ['POST']));
$routes->add('getLogout', new Route('/logout', ['_controller' => 'App\Controller\ControllerLogout@getLogout'],
    [], [], '', [], ['GET']));
$routes->add('getCabinet', new Route('/cabinet', ['_controller' => 'App\Controller\ControllerCabinet@getCabinet'],
    [], [], '', [], ['GET']));
$routes->add('postCabinet', new Route('/cabinet', ['_controller' => 'App\Controller\ControllerCabinet@postCabinet'],
    [], [], '', [], ['POST']));
$routes->add('getAddLink', new Route('/addLink', ['_controller' => 'App\Controller\controllerAddLink@getAddLink'],
    [], [], '', [], ['GET']));
$routes->add('postAddLink', new Route('/addLink', ['_controller' => 'App\Controller\controllerAddLink@postAddLink'],
    [], [], '', [], ['POST']));
$routes->add('getEditLink', new Route('/editLink={id}', ['_controller' => 'App\Controller\controllerEditLink@getEditLink'],
    [], [], '', [], ['GET']));
$routes->add('postEditLink', new Route('/editLink', ['_controller' => 'App\Controller\controllerEditLink@postEditLink'],
    [], [], '', [], ['POST']));
$routes->add('getDeleteLink', new Route('/deleteLink={id}', ['_controller' => 'App\Controller\controllerDeleteLink@getDeleteLink'],
    [], [], '', [], ['GET']));
$routes->add('getContact', new Route('/contact', ['_controller' => 'App\Controller\ControllerContact@getContact'],
    [], [], '', [], ['GET']));


$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->matchRequest($request);
    $request->attributes->replace($parameters);
    $action = $parameters['_controller'];
} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
   $response->setStatusCode('404');
    $response->setContent(include 'src/view/view404.php');
} catch (Symfony\Component\Routing\Exception\MethodNotAllowedException $e) {
    $response->setStatusCode('405');
    $response->setContent(include 'src/view/view405.php');
}

if (isset($action) && is_string($action)) {
    $controller = explode('@', $action);
    $controller_class_name = $controller[0];
    $controller_instance = new $controller_class_name;
    $method = $controller[1];

    $response = $controller_instance->$method($request, $response);
}

if (isset($action) && is_callable($action)) {
    $response = $action($request, $response);
}

$response->send();
