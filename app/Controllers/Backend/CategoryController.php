<?php
  namespace App\Controllers\Backend;
  use App\Controllers\Controllers;

  use App\Model\Category;
  use Respect\Validation\Validator;

  class  CategoryController extends Controllers {

      public function getIndex()
      {
         view('backend/category/index');
      }


      public function postIndex()
      {
          $validator = new Validator();
          $errors = [];
          $title = $_POST['title'];
          $slug = $_POST['slug'];
          $active = $_POST['active'];

          if ($validator::alpha()->validate($title) === false){
              $errors['title'] = 'Category Title Must be Alphabetic';
          }
          if (strlen($title) < 3){
              $errors['title'] = 'Category Title Must be at least 3 characters';
          }
          if (strlen($title) > 30){
              $errors['title'] = 'Title length is too large';
          }

          if ($validator::slug()->validate($slug) === false){
              $errors['slug'] = 'Slug Must be Slug';
          }
          if (strlen($slug) < 3){
              $errors['slug'] = 'Slug Must be at least 3 characters';
          }
          if (strlen($slug) > 25){
              $errors['slug'] = 'Slug length is too large';
          }

          if (empty($errors)){
             Category::create([
                 'title' => $title,
                 'slug'  => strtolower($slug),
                  'active' => $active
             ]);

             $_SESSION['success'] = 'Category Successfully Created';
             header('Location:category');
             exit();

          }

          $_SESSION['errors'] = $errors;
          header('Location:category');


      }

      public function getEdit($id = null)
      {
           if ($id === null){
               view('backend/category/index');
               exit();
           }
           $_SESSION['category_id'] = $id;
           view('backend/category/edit');
           unset($_SESSION['category_id']);

      }

      /**
       * @param null $id
       */
      public function postEdit($id = null)
      {

          if ($id === null){
              view('backend/category/index');
              exit();
          }

           $validator = new Validator();
           $errors = [];
           $title = $_POST['title'];
           $slug = $_POST['slug'];
           $active = $_POST['active'];

          if ($validator::alpha()->validate($title) === false){
              $errors['title'] = 'Category title must be alphabetic';
          }
          if (strlen($title) < 3){
              $errors['title'] = 'Category title must be at least 3 characters';
          }
          if (strlen($title) > 25){
             $errors['title'] = 'Category name is too large';
          }

          if ($validator::slug()->validate($slug) === false){
              $errors['slug'] = 'Slug must be slug format';
          }
          if (strlen($slug) < 3){
              $errors['slug'] = 'Slug name must be at least 3 characters';
          }
          if (strlen($title) > 25){
              $errors['slug'] = 'slug name is too large';
          }



          try{
            if (empty($errors)){
                $category = Category::find($id);
                $category->update([
                    'title' => $title,
                    'slug'  => strtolower($slug),
                    'active' => $active
                ]);

                   $_SESSION['success'] = 'Category Upgrade Successfully';
                   header('Location:../../category');
                   exit();
            }
            $_SESSION['errors'] = $errors;
            view('backend/category/edit');
            exit();

          }catch(\Exception $e){
            $_SESSION['errors'] = ["message" => $e->getMessage()];
              view('backend/category/index');
              exit();
          }

      }


      public function getDelete($id = null)
      {

          if ($id == null){
              view('backend/category/index');
          }

          $category = Category::find($id);

          $category->delete();
          $_SESSION['success'] = 'Category Remove Successfully';
          header('Location:../../category');

      }







  }