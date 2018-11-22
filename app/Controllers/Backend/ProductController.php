<?php
 namespace App\Controllers\Backend;
  use App\Controllers\Controllers;
  use App\Model\Product;
  use Respect\Validation\Validator;

  class ProductController extends Controllers{

      public function getIndex()
      {
          view('backend/product/index');
      }


      public function postIndex()
      {

          $errors = [];
          $validator = new Validator();

          $title = $_POST['title_id'];
          $slug = $_POST['slug'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $sales_price = $_POST['seles_price'];
          $active = $_POST['active'];

          if ($validator::slug()->validate($slug) === false){
              $errors['slug'] = 'Slug Must be Slug Format';
          }
          if (strlen($slug) < 3){
              $errors['slug'] = 'Slug name Must be at least 3 characters';
          }
         if (strlen($slug) > 25){
             $errors['slug'] = 'Slug name is too large';
         }



         if (strlen($description) < 3){
             $errors['description'] = 'Product Description is too short';
         }

         if (strlen($description) > 300){
             $errors['description'] = 'Product Description is too large';
         }

         if ($validator::floatVal()->validate($price) === false){
             $errors['price'] = 'Price Must be Fractional Number';
         }
         if ($validator::floatVal()->validate($sales_price) === false){
             $errors['sales_price'] = 'Sales Price Must be Fractional Number';
         }

         if (empty($errors)){

              Product::create([
                 'title'  => $title,
                 'slug'   => strtolower($slug),
                  'description' => $description,
                 'price'        => $price,
                 'seles_price'  => $sales_price,
                 'active'       => $active
             ]);

             $_SESSION['success'] = 'Product Added Successfully';
             header('Location:../dashboard');
             exit();

         }
         $_SESSION['errors'] = $errors;
         header('Location:product');
         exit();


      }



      public function getView()
      {
          view('backend/product/view');
      }


      public function getEdit($id = null)
      {
          if ($id === null){
              view('backend/product/view');
              exit();
          }
               $_SESSION['product_id'] = $id;
               view('backend/product/edit');
               unset($_SESSION['product_id']);

      }



      public function postEdit($id = null)
      {

          if ($id === null){
              view('backend/product/view');
              exit();
          }

          $validator = new Validator();
          $errors = [];

          $title = $_POST['title_name'];
          $slug = $_POST['slug'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $sales_price = $_POST['seles_price'];
          $active = $_POST['active'];

          if ($validator::slug()->validate($slug) === false){
              $errors['slug'] = 'Slug Must be Slug format';
          }
          if (strlen($slug) < 3){
              $errors['slug'] = 'Slug name must be at least 3 characters';
          }
          if (strlen($slug) > 25){
              $errors['sulg'] = 'Slug name is too long';
          }
          if (strlen($description) < 3){
              $errors['description'] = 'Description at least 3 characters';
          }
          if (strlen($description) > 300){
              $errors['description'] = 'Description is too large';
          }

          if ($validator::floatVal()->validate($price) === false){
              $errors['price'] = 'Price must be fractional number';
          }
          if ($validator::floatVal()->validate($sales_price) === false){
              $errors['sales_price'] = 'Sales Price must be fractional number';
          }

          try{
              if (empty($errors)){

                  $product = Product::find($id);

                  $product->update([
                      'title' => $title,
                       'slug' => $slug,
                        'description' => $description,
                        'price'       => $price,
                         'seles_price' => $sales_price,
                           'active'    => $active

                  ]);

                  $_SESSION['success'] = 'Product Upgrade Successfully';
                  header('Location:../view');
                  exit();

              }
              $_SESSION['errors'] = $errors;
              view('backend/product/view');
              exit();

          }catch (\Exception $exception){
              $errors[] = ['message' => $exception->getMessage()];
              view('backend/product/view');
              exit();
          }

      }


      public function getDelete($id = null)
      {
          if ($id === null){
              view('backend/product/view');
              exit();
          }

           $product = Product::find($id);
          if ($product){
              $product->delete();
              $_SESSION['success'] = 'Product Delete Successfully';
              view('backend/product/view');
              exit();
          }

          view('backend/product/view');
          exit();

      }

  }
