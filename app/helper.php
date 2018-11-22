<?php
  //Here we write helper function;


 if (!function_exists('view')){
     function view($view)
     {
         require_once __DIR__.'/../views/'.$view.'.php';
     }
 }


if (! function_exists('partial_view')) {
    function partial_view($view = 'index'): void
    {
        require_once __DIR__.'../views/partials/'.$view.'.php';
    }
}

 if (!function_exists('dd')){
     function dd($value)
     {
         echo '<pre>';
         var_dump($value);
         echo '</pre>';
         die();
     }

 }