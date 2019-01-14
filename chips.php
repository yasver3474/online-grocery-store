<!DOCTYPE html>
<html lang="en">
<head>
  <title>Snacks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .photo{
	  height: 300px;
	  width: 500px;
  }
    
  </style>
</head>
<body>
<?php
session_start();
$user_check=$_SESSION['logged_in_user'];
	$servername="localhost";
	$username="root";
	$password="";
	$database="project";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
	die("failed".mysqli_connect_error());}
echo'<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Grocery Store </h1>      
   
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../Cover Page3.php">GROCERIES</a>
    </div>
	
	  <form class="navbar-form navbar-left" action="../search.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li class="active"><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">';
	  if(!isset($user_check)){
        echo'<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
	  <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';}
	  else{
		  echo'<li><a href="../logout_project.php"><span class="glyphicon glyphicon-user"></span> LOG OUT ',$user_check,'</a>','</li>
	  <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
	  }
	  echo'
      </ul>
    </div>
  </div>
</nav>
<div style="background:transparent !important"class="jumbotron">
  <div class="container text-center">
    <h1 align="center">Snacks</h1>

   
  </div>
</div>';
 $sql="select item_id,item_name,type,image,quantity,price from items where type like 'chips'";
		 $result=mysqli_query($conn,$sql);
		$var_for_div=mysqli_num_rows($result);
		$count=0;
  while($row=mysqli_fetch_array($result)){
		$count+=1;
		$count2=$count;
         $item_name=$row['item_name']; 
		 $price=$row['price'];
         $type=$row['type'];
		 $image=$row['image'];
         $quantity=$row['quantity'];
		 $item_id=$row['item_id'];
		 
		 if($count==1 or $count==4 or $count==7){
         echo'<div class="container"><div class="row">';
		 }
         echo'<div class="col-sm-4">
         <div class="panel panel-primary">
		 
         <div class="panel-heading">',$item_name.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRs.'.$price,'</div>		 
         <div class="panel-body"><img src="'.$image.'"class="photo img-responsive"style="width:100%" alt="Image"></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         <div class="panel-footer">';echo'<form action="../cart.php" method="post">'.'Quantity<input type="text" name="quantity_from_page" value=""><br><input type="hidden" name="item_id" value='.$item_id.'><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button></form></div>
         </div>
         </div>';
		 if($count==3 or $count==6 or $count==9){
		 echo'</div></div>';
		 echo '<br><br>';
		 $count2=0;
		 }
         
  }
echo'<footer class="container-fluid text-center">
  <p>Online Grocery Store</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>';
?>
</body>
</html>
