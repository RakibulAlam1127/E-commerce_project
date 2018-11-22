<?php
 //Using NameSpace
use App\Controllers\Backend\CategoryController;
use App\Controllers\Backend\DashboardController;
use App\Controllers\Backend\ProductController;
use App\Controllers\Frontend\HomeController;
use Phroute\Phroute\RouteCollector;

$router->filter('auth', function(){
    if(!isset($_SESSION['user']))
    {
        $errors[] = 'You are not Logged In!';
        $_SESSION['errors'] = $errors;
        header('Location: login');
        exit();
    }
});
$router->controller('/',HomeController::class);



$router->group(['before' => 'auth','prefix'=>'dashboard'],function(RouteCollector $router){
    $router->controller('/',DashboardController::class);
    $router->controller('/category',CategoryController::class);
    $router->controller('/product',ProductController::class);
});




