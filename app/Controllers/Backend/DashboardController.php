<?php
namespace App\Controllers\Backend;
 use App\Controllers\Controllers;

 class DashboardController extends Controllers {

     public function getIndex()
     {
       view('backend/dashboard/index');
     }
 }