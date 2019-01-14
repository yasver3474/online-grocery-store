<html>
<head>
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
      color: #2f2f2f;
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
</head>



</head>
<body>  
<?php
//if(isset($_POST["submit"])){
$flag=0;
session_start();
$nameErr = $emailErr = $phoneErr = $addressErr= $passwordErr= $usernameErr="";
$name = $email= $address = $phone = $password_form = $username_ = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$flag=1;
  } else {
    $name = test_input($_POST["name"]);
   
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
		$flag=1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$flag=1;
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	  $flag=1;	  
    }
  }
    
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone Number is Required";
	$flag=1;
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match("/^[0-9]{10}$/",$phone)) {
      $phoneErr = "Invalid Phone Number";
		$flag=1;
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
	$flag=1;
  } else {
    $address = test_input($_POST["address"]);
  }
  if(empty($_POST["password"])){
	  $passwordErr= "Password is required";
	  $flag=1;
  }
  else{
	  $password_form=test_input($_POST["password"]);
	  if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{3,20}$/', $password_form)) {
		$passwordErr="password does not meet the required levels";
		$flag=1;
	}
  }
  if(empty($_POST["username"])){
	  $usernameErr="Username is required";
	  $flag=1;}
	  else {
	$username_=$_POST["username"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="project";
	$conn=mysqli_connect($servername,$username,$password,$database);
	
	if(!$conn){
	die("failed".mysqli_connect_error());
	} 
	$sql="select * from user where username='$username_'";
	
	$check=mysqli_query($conn,$sql);
	if(!$check){
	die("failed".mysqli_error($conn));
	} 
	if(mysqli_num_rows($check)>0){
		$usernameErr="username already exsits enter a new one";
		$flag=1;
	}
	
	  }
	  if($flag!=1)
{
	
	$username_=$_POST["username"];
	$password_=$_POST["password"];
	$servername="localhost";
	$username="root";
	$password="";
	$database="project";
	$conn=mysqli_connect($servername,$username,$password,$database);
	
	if(!$conn){
	die("failed".mysqli_connect_error());
		} 
		$primary="select * from login ;";
		$check=mysqli_query($conn,$primary);
		$user_id_login=1000+mysqli_num_rows($check);
	$sql="insert into login values('$user_id_login','$username_ ','$password_');";
	$check=mysqli_query($conn,$sql);
	if(!$check){
		die("Could not register you!".mysqli_error($conn));
	}
	else {
		
		$primary="select * from user ;";
		$check=mysqli_query($conn,$primary);
		$user_id=1000+mysqli_num_rows($check);
		
		$sql="insert into user values('$user_id','$username_','$name','$address','$phone','$email');" ;
		$check2=mysqli_query($conn,$sql);
		if(!$check2){
			die("failed".mysqli_error($conn));
		}
		else {
			 echo '<script type="text/javascript"> alert("You have been added to our database!"); window.location= "../Cover Page3.php";</script>';
			$_SESSION['logged_in_user']=$username_;
		}
		}
}

	  
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<header class="container-fluid bg-4 text-center">
  <h1>SIGN UP</h1> 
</header>
<nav class="navbar navbar-fixed-top" >
</nav>
<div class="container-fluid bg-1 text-center">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone Number: <input type="text" name="phone" value="<?php echo $phone;?>">
  <span class="error">*<?php echo $phoneErr;?></span>
  <br><br>
  Address: <textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>'
  <span class="error">*<?php echo $addressErr;?></span>
  <br><br>
  Username(Can be Only 7 Characters Long):<input type="text" name="username" value=""<?php echo $username_;?>">
  <span class="error">*<?php echo $usernameErr;?></span>
  <br><br>
  Password(7 Characters with atleast 1 
  digit and 1 special character):<input type="password" name="password" value="">
  <span class="error" >*<?php echo $passwordErr; ?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
<footer class="container-fluid bg-4 text-center">
  <h2>DO VISIT US AGAIN.</h2> 
</footer>
	
</body>
</html>