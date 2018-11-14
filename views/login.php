<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asstes/css/style.css">
    <link rel="stylesheet" href="asstes/css/all.css">
    <link rel="stylesheet" href="asstes/css/bootstrap.min.css">


    <title>login Page</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                     <?php require_once 'partials/_notification.php'; ?>
                    <form class="form-signin" action="login" method="post">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-4">
                        <a href="register">Have no account? please Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="asstes/js/jquery.min.js"></script>
    <script src="asstes/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>