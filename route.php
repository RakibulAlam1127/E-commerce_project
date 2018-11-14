<?php
 //Using NameSpace
use App\Controllers\Backend\DashboardController;
use App\Controllers\Frontend\HomeController;




$router->controller('/',HomeController::class);
$router->controller('/dashboard',DashboardController::class);

