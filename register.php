<?php
require 'functions.php';
if (isset($_POST['submit'])) {
	if (register($_POST) > 0) {
		echo "
            <script>
                alert('Akun Berhasil Dibuat, Silahkan Login');
                document.location.href='login.php';
            </script>
            ";
	} else {
		echo "
            <script>
                alert('Maaf Data Akun Gagal Dibuat... Silahkan Cek Data Anda!!!');
                document.location.href='register.php';
            </script>
            ";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Register System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style-login.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
	<!-- Main Container -->
	<div class="container-fluid">
		<div class="row">
			<!-- IMAGE CONTAINER BEGIN -->
			<!-- <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div> -->
			<div class="col-md-6 col-lg-6">
				<img src="Assets/img/logo/Illustration.png" alt="logo login" class="img-fluid d-block mx-auto mt-4" style="max-height: 600px;">
			</div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<!-- FORM BEGIN -->
				<div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
					<!-- Company Logo
					<div class="text-center mb-3 mt-5">
						<img src="logo.png" width="150px">
					</div> -->
					<div class="text-center mb-4">
						<h4>Create an account</h4>
					</div>
					<!-- Form -->
					<form class="px-3" method="POST" action="">
						<!-- Input Box -->
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" name="fullname" placeholder="Full Name" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email Address" tabindex="10" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<!-- Register Button -->
						<div class="mb-3">
							<button type="submit" class="btn btn-block" name="submit">Register</button>
						</div>
						<!-- <div class="text-center mb-2"> -->
						<!-- <div class="text-center mb-3" style="color: #777;">or login with</div> -->

						<!-- Facebook Button -->
						<!-- <a href="" class="btn btn-social btn-facebook">facebook</a> -->

						<!-- Google Button -->
						<!-- <a href="" class="btn btn-social btn-google">google</a> -->

						<!-- Twitter Button -->
						<!-- <a href="" class="btn btn-social btn-twitter">twitter</a> -->
						<!-- </div> -->
						<div class="text-center mb-5" style="color: #777;">Already have an account?
							<a class="login-link" href="login.php">Login here</a>
						</div>
					</form>
				</div>
				<!-- FORM END -->
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
</body>

</html>