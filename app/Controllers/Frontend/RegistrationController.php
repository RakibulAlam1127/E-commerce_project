<?php
 namespace App\Controllers\Frontend;
 use App\Controllers\Controllers;
 class RegistrationController extends Controllers {

     public function getIndex()
     {
         $this->view('registration');
     }
 }


?>