<?php

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;


require_once 'vendor/autoload.php';

$router = new RouteCollector(new RouteParser());
$router->get('/',function(){
  return 'Hello i am php index page';
});

$dispatcher = new Dispatcher($router->getData());
$url = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$url = str_replace('E-commerceProject', '', $url);
//die(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
    echo $response;
}catch(HttpRouteNotFoundException $e){
  echo $e->getMessage();
  die();
}catch (HttpMethodNotAllowedException $exception){
   echo $exception->getMessage();
   die();
}