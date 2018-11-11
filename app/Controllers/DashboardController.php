<?php
namespace App\Controllers;
 class DashboardController extends Controllers {

     public function getIndex()
     {
         $this->view('dashboard');
     }
 }