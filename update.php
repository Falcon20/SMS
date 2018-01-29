<?php
session_start();
if(!$_SESSION['name']){
	header('location:index.php');
}
$servername = "localhost";
$username = "id4422530_123";
$password = "Espn@12345";

// Create connection
$conn = mysqli_connect($servername,$username, $password,'id4422530_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
@$rollno=$_GET['rollno'];
$qry="SELECT * FROM `student1` WHERE `rollno`='$rollno'";
$run=mysqli_query($conn,$qry);
$data=mysqli_fetch_assoc($run);
?>

<html>
<head>
<link rel ="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body style="background-image: url('./about.jpg');">
<div class="page-header well well-sm">
  <h2 align="center">Welcome to Student Portal</h2	>
</div>
<h2 align="center">Update Student Details</h2>
<h4><a href="view.php">View/Update</a></h4>
<h4><a href="logout.php">Logout</a></h4>
<form action="update.php" method="post" enctype="multipart/form-data">
<table class="table table-hover table-bordered">
<tr>
<td><h4 align="center">Student Name</h4></td>
<td><input type="text" name="name" value="<?php echo $data['name']?>"</td>
</tr>
<tr>
<td><h4 align="center">Email</h4></td>
<td><input type="email" name="email" value="<?php echo $data['email']?>"></td>
</tr>
<tr>
<td><h4 align="center">Roll no</h4></td>
<td><input type="varchar" name="rollno" value="<?php echo $data['rollno']?>"</td>
</tr>
<tr>
<td><h4 align="center">Contact no.</h4></td>
<td><input type="text" name="contactno" value="<?php echo $data['contactno']?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['Submit'])){
	$name=$_POST['name'];
	$rollno=$_POST['rollno'];
	$contactno=$_POST['contactno'];
	$email=$_POST['email'];
	$qry="UPDATE `student1` SET `name`='$name',`email`='$email',`contactno`='$contactno',`rollno`='$rollno' WHERE rollno='$rollno'";
	if($run=mysqli_query($conn,$qry)){
		?>
		<script>
			alert("Record updated");
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert("Data could not be updated");
		</script>
		<?php
	}
	
}
?>