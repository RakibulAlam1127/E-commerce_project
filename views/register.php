<?php require_once 'partials/_reg_log_header.php' ?>
<div class="container">
    <div class="row">
         <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign Up</h5>
                        <?php require_once 'partials/_notification.php'; ?>
                    <form class="form-signin" action="register" method="post" enctype="multipart/form-data">

                        <div class="form-label-group">
                            <input type="text" id="inputusername" name="username" class="form-control" placeholder="UserName" required autofocus>
                            <label for="inputusername">User Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">E-mail address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="file" id="inputImage" name="profile_photo" class="form-control"  required>
                            <label for="inputfile">Upload Image</label>
                        </div>

                        <input class="btn btn-lg btn-primary btn-block text-uppercase" name="register" value="Sign Up" type="submit"/>
                        <hr class="my-4">
                        <a href="login">Have a account?Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'partials/_reg_log_footer.php'?>

