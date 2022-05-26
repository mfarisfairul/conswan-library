<?php
include('include/dbcon.php');

if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login_query=mysqli_query($con,"select * from admin_staff where username='$username' and password='$password'");
	$count=mysqli_num_rows($login_query);
	$row=mysqli_fetch_array($login_query);
	if ($count > 0){
		session_start();
		$_SESSION['id']=$row['admin_id'];
		echo "<script>alert('Successfully Login!');
		window.location='home.php'</script>";
	}
	else{
		echo "<script>alert('Invalid Username or Password! Please Try again.'); window.location='login.php'</script>";
		

?>
<?php } 
}
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/conswancss/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<title>Conswan Library | Login Page</title>
</head>

<body>
	<!-- form area -->
	<a href="index.php"><i class="fas fa-arrow-left fa-pull-left" style="width: 20px; padding-left: 20px;"></i></a>
	<div class="form">
		<!-- login form -->
		<form class="loginform" action="" method="post"> 
			<a href="index.php"><i class="fas fa-arrow-left fa-pull-left" style="width: 20px;"></i></a>
			<i class="fas fa-user-circle"></i>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>LOGIN PAGE</p>
			<br/>
			<input class="userinput" type="text" name="username" placeholder="Username" required value="<?php if(isset($_COOKIE["username"])) {echo $_COOKIE["username"]; } ?>">
			
			<input id="inputpswd" class="userinput" type="password" name="password" maxlength="10" placeholder="Password" required value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"]; } ?>">
			<div class="options">
				<a href="#" style="color: #bbb; font-style: italic; font-size: 14px; margin-left: 200px; margin-top: 5px;" ><input type="checkbox" class="showpassword" onClick="myFunction()"> Show password </a>
			</div><br/>
			
			
			<input class="btn"  type="submit" name="login" value="LOGIN"><br/><br/>
			<!--<div class="options1">
				<a href="#">Forgot password ?</a>
			</div>-->
			
			<!--<div class="options1">
				<a href="#">Forgot password ?</a>
			</div>-->
			<p>_________________________</p>
			
				<div class="footer-bottom">
					<h1><i class="fa fa-university"></i>&nbsp;SMK CONVENT SITIAWAN</h1>
					<p style="color: white;">Copyright &copy; 2021 Conswan Library Management System</p>
				</div>
			
		</div>
			<!-- login form end -->
		</form>
	</div>
	
	<script>
				function myFunction() {
					 var x = document.getElementById("inputpswd");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
	
	
</body>
</html>