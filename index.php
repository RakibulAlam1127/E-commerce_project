<?php


use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser;
use Illuminate\Database\Capsule\Manager as Capsule;


require_once 'vendor/autoload.php';
session_start();
//Database connection
$capsule = new Capsule();
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'e-commerceproject',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$users = Capsule::table('users')->first();

$router = new RouteCollector(new RouteParser());
require_once 'route.php';
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