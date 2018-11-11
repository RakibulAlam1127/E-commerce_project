<?php
 namespace App\Controllers\Frontend;
 use App\Controllers\Controllers;
 class HomeController extends Controllers {

     public function getIndex()
 {
    $this->view('home');
 }


 }