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
echo $rollno=$_GET['rollno'];
$sql="DELETE FROM `student1` WHERE `rollno`='$rollno'";
if($run=mysqli_query($conn,$sql))
{
	?>
	<script>
		alert("Record Deleted");
	</script>
	<?php
}
else
{
	?>
	<script>
		alert("Record could not Deleted");
	</script>
	<?php
	
}
header('Location:view.php');
?>