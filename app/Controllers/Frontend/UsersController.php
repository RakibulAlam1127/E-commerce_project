<?php
  namespace App\Controllers\Frontend;
  use App\Controllers\Controllers;
  class UsersController extends Controllers {

      public function getIndex()
      {
          $this->view('login');
      }

  }