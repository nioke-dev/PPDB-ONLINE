<?php
require '../functions.php';

session_start();



if (isset($_SESSION['login'])) {
    # code...
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $login = login_admin($_POST);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../style-login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- link fonts poppins all family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- IMAGE CONTAINER BEGIN -->
            <!-- <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div> -->
            <div class="col-md-6 col-lg-6">
                <img src="../Assets/img/logo/Illustration.png" alt="logo login" class="img-fluid d-block mx-auto mt-4" style="max-height: 600px;">
            </div>
            <!-- IMAGE CONTAINER END -->

            <!-- FORM CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 infinity-form-container">
                <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">

                    <?php
                    if (isset($login['error'])) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $login['pesan']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="text-left mb-4">
                        <h6 class="" style="font-size: 20px;">Welcome To</h6>
                        <h4 class="font-weight-bold" style="color: #6358DC; font-weight: bold; font-size: 35px; font-family: Poppins;">SMK NEGERI 1 GENDING</h4>
                    </div>
                    <!-- Company Logo -->
                    <!-- <div class="text-center mb-3 mt-5">
						<img src="logo.png" width="150px">
					</div> -->
                    <div class="text-center mb-4">
                        <h4>Login into account ADMIN</h4>
                    </div>
                    <!-- Form -->
                    <form class="px-3" method="POST" action="">
                        <!-- hidden input id -->
                        <!-- Input Box -->
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="row mb-3">
                            <!--Remember Checkbox -->
                            <div class="col-auto d-flex align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label" for="cb1">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block" name="submit">Login</button>
                        </div>
                        <!-- Forget Password -->
                        <div class="text-left">
                            <a href="reset.html" class="forget-link">Forgot password?</a>
                        </div>
                        <div class="text-center mb-5" style="color: #777;">Don't have an account?
                            <a class="register-link" href="register.php">Register here</a>
                        </div>
                    </form>
                </div>
                <!-- FORM END -->
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>