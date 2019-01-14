<?php
$buy_now=$_POST["buy_now"];
$user_id=0;
$item_id=0;
$quantity=0;
$user_check=0;
session_start();
if(isset($buy_now)){
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
$sql1="call cartToBuy('$user_id')";
$result=mysqli_query($conn,$sql1);
$sql2="select * from buy";
$result1=mysqli_query($conn,$sql2);
while($row1=mysqli_fetch_array($result1)){
	$quantity=$row1['quantity'];
	$item_id=$row1['item_id'];
	$sql3="update items set quantity=quantity-'$quantity' where item_id='$item_id'";
	$result2=mysqli_query($conn,$sql3);
/*	
if(!$result2){
die(mysqli_error($conn));}
*/
}

 echo '<script type="text/javascript"> alert("Order Placed!"); window.location= "../Cover Page3.php";</script>';
	
}	
?>
