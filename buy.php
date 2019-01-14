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
      color: #ffffff;
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
	  
      padding-top: 100px;
      padding-bottom: 100px;
	  
      padding-left: 100px;
      padding-right: 100px;
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
  .photo{
	  height: 250px;
	  width: 30px;
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
//$quantity=$_POST['quantity_from_page'];

$user_check=$_SESSION['logged_in_user'];
//$search=$_POST["search"];
$servername="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($servername,$username,$password,$database);
//echo $item_id;
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
	  	 if(!isset($user_id)){
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
        </a></li>';
	  }

	  echo'</ul>
    </div>
  </div>
</nav>';
	
	//select item id from orders where userid=$userid
	//select photo item,item name ->items table main
	//selec item_id from orders where user_id=$user_id
	//select photo_item,item_name from items where items_id on (select item_id from orders where user_id=$user_id)
	$quantity1=0;
	if(!$conn){
	die("failed".mysqli_connect_error());
		} 
		$sql="select image,item_name,item_id,price from items where item_id in (select item_id from orders where user_id='$user_id' and order_id in (select DISTINCT order_id from orders))";
		 $result=mysqli_query($conn,$sql);
		 $var=mysqli_num_rows($result);
		 	if($var==0){
      echo '<script type="text/javascript"> alert("You have not added anything to your cart yet!"); window.location= "../Cover Page3.php";</script>';
	  
    }
	$total_price=0;
while($row=mysqli_fetch_array($result)){
		//$item_id1;
		$item_price=0;
        $item_name=$row['item_name'];
		$image=$row['image'];
		$price=$row['price'];
		$item_id1=$row['item_id'];
		$sql1="select quantity from orders where item_id='$item_id1' and user_id='$user_id' and item_id in (select distinct item_id from orders)";
		$result1=mysqli_query($conn,$sql1);
		while($row1=mysqli_fetch_array($result1)){
		 $quantity1=$row1['quantity'];
		 $_SESSION['q_cart']=$quantity1;
		 $item_price=$price*$quantity1;
		 $total_price=$total_price+$item_price;
		 echo'<div class="container">
		 <div class="panel panel-primary">
		 <div class="panel-heading">';
		 echo $item_name;
		 echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Quantity:&nbsp&nbsp'.$quantity1;
		 echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal Price:&nbsp&nbsp'.$item_price;
		 echo'</div><div class="panel-body"><img src="'.$image.'" class=" photo img-rounded" style="width:50%" alt="test" />';
		 echo'</div><div class="panel-footer"><form action="../delete_from_cart.php" method="post"><input type="hidden" name="q_cart" value="'.$quantity1.'"><br><input type="hidden" name="item_id" value="'.$item_id1.'"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Delete From Cart</button></form></div>
		 </div><br>';
		}
		echo '<br>';
		//echo '&nbsp&nbspTotal Price:&nbsp&nbsp'.$total_price;
		echo '<div class=" container"  
		 <div class="panel panel-primary">
		 <div class="panel-heading">';
		 //echo '&nbsp&nbspTotal Price:&nbsp&nbsp'.$total_price;
		 echo '</div></div></div>';
	}
		//echo '&nbsp&nbspTotal Price:&nbsp&nbsp'.$total_price;
		echo '<div class=" bg-2 container"  
		 <div class="panel panel-primary">
		 <div class="panel-heading">';
		 echo'<form action="../buy_now.php" method="post"><button type="submit" class="btn btn-default" name="buy_now"><span class="glyphicon glyphicon-shopping-cart"></span>Buy Now(COD)</button>';
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal Price:&nbsp&nbsp'.$total_price;
		 $_SESSION['total_price']=$total_price;
		 echo '</form></div></div></div>';
  
  
?>
</body>
</html>
