<?php
 namespace App\Controllers\Frontend;
 use App\Controllers\Controllers;
 use App\Model\User;
 use Carbon\Carbon;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\PHPMailer;
 use Respect\Validation\Validator;

 class HomeController extends Controllers {

     public function getIndex():void
 {
    view('home');
 }

  public function getRegister():void
  {
      view('register');
  }

     /**
      *
      */
     public function postRegister():void
   {


       $validator = new Validator();
       $errors = [];
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $profile_photo = $_FILES['profile_photo'];

//       Vaildation with respect validation php package

       if ($validator::alnum()->noWhitespace()->validate($username) === false){
           $errors['username'] = 'Username can only Contains alphabets or numeric';
       }
       if (strlen($username) < 6){
           $errors['username'] = 'Username Must be at least 6 character';
       }
       if (strlen($username) > 50){
           $errors['username'] = 'Username is too long!';
       }

       if ($validator::email()->validate($email) === false){
           $errors['email'] = 'Enter the valid E-mail address';
       }
       if (strlen($password) < 6){
           $errors['password'] = 'Password Must be at least 6 Character';
       }
       if (strlen($password) > 30){
           $errors['password'] = 'Password is too long';
       }

       if ($validator::image()->validate($profile_photo)){
           $errors['profile_photo'] = 'Profile Photo Must be Image file';
       }


       if (empty($errors)) {
         //Check $error empty of not;
           $file_name = 'profile_photo'.time();
           $extention = explode('.',$profile_photo['name']);
           $ext = end($extention);
           move_uploaded_file($profile_photo['tmp_name'],'media/profile_photo/'.$file_name.'.'.$ext);
           $token = sha1($username.$email.uniqid('mRa',true));

           //Data insert Users table
           User::create([
                'username' => $username,
                'email'    => $email,
                'password' => password_hash($password,PASSWORD_BCRYPT),
                'profile_photo' => $file_name.'.'.$ext,
                'email_verification_token' => $token

           ]);
           //send email

           $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
           try {
               //Server settings
               $mail->SMTPDebug = 2;                                 // Enable verbose debug output
               $mail->isSMTP();                                      // Set mailer to use SMTP
               $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
               $mail->SMTPAuth = true;                               // Enable SMTP authentication
               $mail->Username = '34724cd39f2d08';                 // SMTP username
               $mail->Password = '3e2b2e582667ac';                           // SMTP password
               $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
               $mail->Port = 2525;                                    // TCP port to connect to

               //Recipients
               $mail->setFrom('me@gmail.com', 'SuperAdmin');
               $mail->addAddress($email,$username);     // Add a recipient


               //Content
               $mail->isHTML(true);                                  // Set email format to HTML
               $mail->Subject = 'Your Registration is Successfully!';
               $mail->Body    = 'Hey ! '.$username.' Please Click the following link to active Your account<br>
                <a target="_blank" href="http://localhost/E-commerceProject/active/'.$token.'">Click Here to Active</a>';
               $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

               $mail->send();
               echo 'Message has been sent';
           } catch (Exception $e) {
               echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
           }



           $_SESSION['success'] = 'Your Registration Successfully!';
           header('Location:login');
           exit();

       }

       $_SESSION['errors'] = $errors;
       header('Location:register');
       exit();


   }

   public function getLogin():void
   {
       view('login');

   }

     /**
      *
      */
     public function postLogin():void
   {
       $errors = [];
       $validator = new Validator();
       $email = $_POST['email'];
       $password = $_POST['password'];

       if ($validator::email()->validate($email) === false){
          $errors['email'] = 'Email address Must be Valid';
       }
       if (strlen($password) < 6){
           $errors['password'] = 'Password Must be at least 6 Character';
       }
       if (empty($errors)){
        $user = User::select(['id','username','email','password','email_verified_at'])->where('email',$email)->first();
         if ($user){
             if (password_verify($password,$user->password)){
                 $_SESSION['success'] = 'Log in Successfully';
                 $_SESSION['user'] = [
                     'id' => $user->id,
                     'email' => $user->email,
                     'username' => $user->username
                 ];
                  header('Location:dashboard');
                  exit();
             }
         }
         $errors[] = 'Wrong Password';
         $_SESSION['errors'] = $errors;
         header('Location:login');
         exit();
       }
       $_SESSION['errors'] = $errors;
       header('Location:login');
       exit();
   }


   public function getActive($token = '')
   {
       $errors = [];
       if (empty($token)){
           $errors[] = 'No Token Provided!';
           $_SESSION['errors'] = $errors;
           header('Location:login');
           exit();
       }

      $user =  User::where('email_verification_token',$token)->first();

       if ($user){

           $user->update([
               'email_verified_at' => Carbon::now(),
               'email_verification_token' => null
           ]);

           $_SESSION['success'] = 'Activated Account, Please Log in';
           header('Location:login');
           exit();
       }

       $errors[] = 'No Token Provided!';
       $_SESSION['errors'] = $errors;
       header('Location:login');
       exit();
   }


   public function getLogout()
   {
       unset($_SESSION['user']);
       $_SESSION['success'] = 'Log Out Successfully';
       header('Location:login');
       exit();
   }



 }