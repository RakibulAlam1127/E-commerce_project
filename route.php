<?php
 //Using NameSpace
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\RegistrationController;
use App\Controllers\UsersController;



$router->controller('/',HomeController::class);
$router->controller('/login',UsersController::class);
$router->controller('/dashboard',DashboardController::class);
$router->controller('/registration',RegistrationController::class);
$router->controller('/product',ProductController::class);
