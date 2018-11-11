<?php
 //Using NameSpace
use App\Controllers\Backend\DashboardController;
use App\Controllers\Frontend\HomeController;
use App\Controllers\ProductController;
use App\Controllers\Frontend\RegistrationController;
use App\Controllers\Frontend\UsersController;



$router->controller('/',HomeController::class);
$router->controller('/login',UsersController::class);
$router->controller('/dashboard',DashboardController::class);
$router->controller('/registration',RegistrationController::class);
$router->controller('/product',ProductController::class);
