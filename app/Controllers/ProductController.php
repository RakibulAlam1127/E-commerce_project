<?php
 namespace App\Controllers;

 class ProductController extends Controllers{

     public function getIndex()
     {
         $this->view('product');
     }
 }