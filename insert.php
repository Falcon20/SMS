<html>
<head>
<link rel ="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body style="background-image: url('./about.jpg');">	
<div class="page-header well well-sm">
  <h2 align="center">Insert Student Details
  <a href="view.php"><button type="button" class="btn btn-primary">View/Update</button></a>
  <a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
  </h6></h2	>
</div>
<form action="insert.php" method="post" enctype="multipart/form-data">
<table class="table table-hover">
<tr>
<td><h4 align="center">Student Name</h4></td>
<td><input type="text" name="name" placeholder="Enter student name"></td>
</tr>
<tr>
<td>
<h4 align="center">Insert image</h4>
</td>
<td><input type="file" name="simg"></td>
</tr>
<tr>
<td><h4 align="center">Email</h4></td>
<td><input type="email" name="email" placeholder="type the email"></td>
</tr>
<tr>
<td><h4 align="center">Roll no</h4></td>
<td><input type="varchar" name="rollno" placeholder="Enter the roll no"></td>
</tr>
<tr>
<td><h4 align="center">Contact no.</h4></td>
<td><input type="text" name="contactno" placeholder="type contact no"></td>
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
session_start();
if(!$_SESSION['name']){
	header('location:index.php');
}
if(isset($_POST['Submit'])){
	$servername = "localhost";
$username = "id4422530_123";
$password = "Espn@12345";

// Create connection
$conn = mysqli_connect($servername,$username, $password,'id4422530_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
$name=$_POST['name'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$imagename=$_FILES['simg']['name'];
$tempname=$_FILES['simg']['tmp_name'];
$rollno=$_POST['rollno'];

move_uploaded_file($tempname,"dataimg/$imagename");
	$qry="INSERT INTO `student1`(`name`, `email`, `contactno`,`image`,`rollno`) VALUES ('$name','$email','$contactno','$imagename','$rollno')";
	$run=mysqli_query($conn,$qry);
	if($run){
		?>
		<script>
		alert("data inserted successfully");
		</script>
		<?php
		}
	else
	{
		?>
		<script>
		alert("Roll no already exist");
		</script>
		<?php
	}

}
?>