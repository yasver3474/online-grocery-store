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
  .photo{
	  height: 300px;
	  width: 300px;
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
$quantity=$_POST['q_cart'];

$user_check=$_SESSION['logged_in_user'];
//$search=$_POST["search"];
$servername="localhost";
$username="root";
$password="";
$database="project";
$conn=mysqli_connect($servername,$username,$password,$database);
//$sql="select item_id,user_id,quantity from orders";
$sql="delete from orders where item_id='$item_id' and user_id='$user_id' and quantity='$quantity' ";
$result=mysqli_query($conn,$sql);
/*
while($row=mysqli_fetch_array($result))
{
	$i_id=$row['item_id'];
	$u_id=$row['user_id'];
	$quan=$row['quantity'];	
echo $item_id." ".$user_id." ".$quantity."<br>";
$sql1="delete from orders where item_id='$i_id' and user_id='$u_id' and quantity='$quan'";
$result1=mysqli_query($conn,$sql1);
} 
*/
echo '<script type="text/javascript"> alert("Item has been deleted from your cart"); window.location= "../Cover Page3.php";</script>';
?>
</body>
</html>
