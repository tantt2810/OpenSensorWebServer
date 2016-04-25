<!DOCTYPE html>
<html>
<head>
	<title>He Thong Hien Thi Du Lieu Cam Bien</title>
	<link rel="stylesheet" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome-4.5.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style type="text/css">
		#login_form{
			margin-top: 100px;
		}

	</style>
</head>
<body>

	<div class="container">
	<div class="row col-md-4 col-md-offset-4">
	<form class="form-signin" action="login.php" method="POST" id="login_form">
        <h2 class="form-signin-heading" style="text-align:center">OpenSensor</h2>
        <div class="input-group">
        	<span class="input-group-addon"><i class="fa fa-user"></i></span>
        	<input type="text" id="inputUsername" class="form-control" placeholder="Tên đăng nhập" required="" autofocus="" name="username">
        </div>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="" name="pass">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Ghi nhớ mật khẩu
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Login">Đăng nhập</button>
      </form>
      <!-- </div> -->
      </div>
      </div>
</body>
</html>
<?php
	if(isset($_POST['Login'])){
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$admin1 = "admin";
		// if( ($username === "admin") && ($pass === "admin")){
		if(strcmp($username, "admin") == 0 && strcmp($pass, "admin") == 0){
			session_start();
			$_SESSION['login'] = "LOG IN SUCCESS";
			header("location: index.php");	
		}
		else{
			header("location: login.php");
		}
	}
?>