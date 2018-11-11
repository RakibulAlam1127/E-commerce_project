<?php
 namespace App\Controllers;

 class HomeController extends Controllers {

     public function getIndex()
 {
    $this->view('home');
 }


 }