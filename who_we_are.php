<!DOCTYPE html>
<html lang="en">
<head>
  <title>Who are We</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 1500px}
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }  
  </style>
</head>
<body>
<?php
session_start();
$user_check=$_SESSION['logged_in_user'];
echo'
  <div class="container-fluid">
		  <div class="row content">
		  <div class="col-sm-3 sidenav">
		  <h4>More Links</h4>
		  <ul class="nav nav-pills nav-stacked">
		  <li class="active"><a href="Cover Page3.php">Home</a></li>
		  <li><a href="#">What we Do</a></li>
		  <li><a href="#section3">More About Us</a></li>
		  <li><a href="#section3">Go Shopping!</a></li>
		  </ul><br>
		  <div class="input-group">
		  <input type="text" class="form-control" placeholder="Search Something">
		  <span class="input-group-btn">
		   <button class="btn btn-default" type="button">
		   <span class="glyphicon glyphicon-search"></span>
		   </button>
		   </span>
		   </div>
	</div>
    <div class="col-sm-9">';
	if(isset($user_check))
		{
			echo'<h4><small>Hello </small>';echo $user_check;echo'</h4>';
		}
	else{
		echo'<h4><small>Hello </small></h4>';
		}
	  echo'<hr>
      <h5><span class="glyphicon glyphicon-time"></span> Post by The One Stop Market, Oct 12, 2018.</h5>
      <h5><span class="label label-danger">Students</span> <span class="label label-primary">Grocery</span></h5><br>
      <h3>Developed by :<br>Yashvardhan Verma - 17103221<br>Swapnil Kusumwal - 17103207<br>Ashish Singh - 17103205<br>Siddhant Ranjan Singh-17103357</h3>
	  
      <br><br>
      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
     </div>
    </div>
    </div>
  

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>';
?>

</body>
</html>
