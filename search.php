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
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 40px;
      padding-bottom: 40px;
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

<body>
<?php
$user_id=0;
$item_id=0;
$quantity=0;
$user_check=0;
session_start();
$user_id=$_SESSION['user_id'];
$item_id=$_POST['item_id'];
$quantity=$_POST['quantity_from_page'];
$user_check=$_SESSION['logged_in_user'];
$search=$_POST["search"];
$servername="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($servername,$username,$password,$database);
echo'<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../Cover Page3.php">GROCERIES</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">';
	  	 if(!isset($user_check)){
		echo'
        <li><a href="../who_we_are.html">WHO ARE WE</a></li>
        <li><a href="../login_project.php">
        <span class="glyphicon glyphicon-briefcase">LOG IN</span>
        </a></li>
        <li><a href="../signUp.php">
          <span class="glyphicon glyphicon-user">SIGN UP</span>
        </a></li>';
	  }
	  else{
		  echo '<li><a href="../who_we_are.html">WHO ARE WE</a></li>
        <li><a href="../logout_project.php">
          <span class="glyphicon glyphicon-user">LOG OUT ';echo $user_check,'
        </a></li>
        </li>';
	  }

	  echo'
	  </ul>
    </div>
  </div>
</nav>';
	
	if(!$conn){
	die("failed".mysqli_connect_error());
		} 
		$sql="select item_id,item_name,type,image from items where item_name like '%".$search."%' or type like '%".$search."%'" ;
		 $result=mysqli_query($conn,$sql);
		$var=mysqli_num_rows($result);
		if($var==0){
      echo '<script type="text/javascript"> alert("No such thing exists in our Database Sorry!"); window.location= "../Cover Page3.php";</script>';
	  
    }
		
  while($row=mysqli_fetch_array($result)){
		$item_id=$row['item_id'];
         $item_name=$row['item_name']; 
         $type=$row['type'];
		 $image=$row['image'];
		 echo'<div class="container">
		 <div class="panel panel-primary">
		 <div class="panel-heading">';
		 echo $item_name;
		 echo'</div><div class="panel-body"><img src="'.$image.'" class="img-rounded" style="width:50%" alt="test" />
		 </div>
		 <div class="panel-footer"><form action="../cart.php" method="post" class="bg-1">Quantity<input type="text" name="quantity_from_page" value=""><br><input type="hidden" name="item_id" value='.$item_id.'><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button></form></div>
		 <div class="panel-footer">
		 </div></div></div><br>';

		  
  
  }
?>
</body>
</html>
