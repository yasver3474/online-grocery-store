<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #000000;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #2f2f2f;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #2f2f2f;
  }
  .bg-3 { 
      background-color: #1abc9c; 
      color: #2f2f2f;
  }
  .bg-4 { 
      background-color: #474e5d; /* Black Gray */
      color: #ffffff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
	  
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
<title>Login</title>
</head>
<body>
<?php
session_start();
$_SESSION['logged_in_user']=0;
$_SESSION['user_id']=0;		
$flag=0;

$username_from_login=$password_from_login=$usernameErr=$passwordErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["username"])){
	  $usernameErr="Username is required";
	  $flag=1;}
if(empty($_POST["password"])){
	  $passwordErr="Password is required";
	  $flag=1;}
if($flag!=1){
	$username_from_login=$_POST["username"];
	$password_from_login=$_POST["password"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="project";
	$conn=mysqli_connect($servername,$username,$password,$database);
	
	if(!$conn){
	die("failed".mysqli_connect_error());}
	$sql="select * from login where username='$username_from_login' and password='$password_from_login';";
	$check=mysqli_query($conn,$sql);
	if(!$check){
	die("failed".mysqli_error($conn));
	} 
	if(mysqli_num_rows($check)!=1){
		$usernameErr="Incorrect Username";
		$passwordErr="Incorrect Password";
	}
	else{
		$sql="select user_id from user where username='$username_from_login'";
		$result=mysqli_query($conn,$sql);
		if(!$result){
	die("failed".mysqli_error($conn));
	} 
		$row=mysqli_fetch_assoc($result);
		$user_id=$row['user_id'];
		$_SESSION['logged_in_user']=$username_from_login;
		$_SESSION['user_id']=$user_id;
		//echo $user_id;
		header("Location: Cover Page3.php");
	}
	}
}
	
?>	
	
<header class="container-fluid bg-4 text-center">
  <h1>LOG IN</h1> 
</header>
<nav class="navbar navbar-fixed-top" >
</nav>

<div class="container-fluid bg-1 text-center">
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 Username:<input type="text" name="username" value="">
  <span class="error">*<?php echo $usernameErr;?></span>
  <br><br>
  Password:<input type="password" name="password" value="">
  <span class="error" >*<?php echo $passwordErr; ?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
<div class="container-fluid bg-4 text-center">
	<h1>Exciting Deals are Just A Click Away Now!</h1>
	</div>
</body>
</html>