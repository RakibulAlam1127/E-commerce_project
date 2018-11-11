<?php
  namespace App\Controllers;
  class UsersController extends Controllers {

      public function getIndex()
      {
          $this->view('login');
      }

  }