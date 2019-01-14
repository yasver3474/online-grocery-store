<!DOCTYPE html>
<html lang="en">
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
  .yash
  {height: 500px;
  width: 600px;
  }
</style>
</head>
<body>
<?php
session_start();
$user_check=$_SESSION['logged_in_user'];
if(isset($flag)){
echo'<script>alert("Item has been to your cart")</script>';}
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
        <li><a href="../who_we_are.php">WHO ARE WE</a></li>
        <li><a href="../login_project.php">
        <span class="glyphicon glyphicon-briefcase">LOG IN</span>
        </a></li>
        <li><a href="../signUp.php">
          <span class="glyphicon glyphicon-user">SIGN UP</span>
        </a></li>';
	  }
	  else{
		  echo '<li><a href="buy.php"><span class="glyphicon glyphicon-shopping-cart"></span>Your Cart</a></li>
        <li><a href="preOrder.php"><span class="glyphicon glyphicon-shopping-cart"></span>Your Previous Orders</a></li>
		<li><a href="../logout_project.php">
          <span class="glyphicon glyphicon-user">LOG OUT ';echo $user_check,'
        </a></li>
        </li>';
	  }

	  echo'
	  </ul>
    </div>
  </div>
</nav>
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">One Stop Grocery Store</h3>
  <img src="../groceries_drupal.jpg" class="img-responsive img-circle margin" style="display:inline" alt="GROCERY" width="350" height="350">
  <h3>Shop With Ease</h3>
</div>
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">WHAT DO YOU WANT TO BUY TODAY?</h3>
  <p><form class="navbar-form navbar-middle" action="../search.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form></p>
  <p>Or Choose From the Links Given Below!</p>
 <a href="../fruits.php" class="btn btn-default btn-lg" target="_blank">Fruits</a>
  <a href="../vegetables.php" class="btn btn-default btn-lg" target="_blank">Vegetables</a>
  <a href="../soaps.php" class="btn btn-default btn-lg" target="_blank">Soaps</a>
  <a href="../shampoos.php" class="btn btn-default btn-lg" target="_blank">Shampoos</a>
  <a href="../biscuits.php" class="btn btn-default btn-lg" target="_blank">Biscuits</a>
  <a href="../toilet cleaners.php" class="btn btn-default btn-lg" target="_blank">Toilet Cleaners</a>
  <a href="../laundry.php" class="btn btn-default btn-lg" target="_blank">Laundry Items</a>
  <a href="../namkeen.php" class="btn btn-default btn-lg" target="_blank">Snacks</a>
</div>
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin"></h3> <a href="../who_we_are.php">WHERE TO FIND US</a><br>
  <div class="row">
    <div class="col-sm-4">
    <img src="../GROCERIES1.jpg" class="yash img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <img src="../groceries3.jpg" class="yash img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <img src="../groceries2.jpg" class="yash img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>
<footer class="container-fluid bg-4 text-center">
  <p>DO VISIT US AGAIN.</p> 
</footer>
</body>
</html>';
?>