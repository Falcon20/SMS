<html>
<head>
<link rel ="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body style="background-image: url('./about.jpg');">
<div class="page-header well well-sm">
  <h2 align="center">Welcome to Student Directory</h2	>
</div>
<h2 align ="center">Admin Login</h2>
<form action="index.php" method="post">
<table class="table table-hover">
<tr>
<td>
<h3 align="center">Name :</h3>
</td>
<td>
<input type="text" name="name" placeholder="Enter your name">
</td>
</tr>
<tr>
<td>
<h3 align="center">Password :</h3>
</td>
<td>
<input type="password" name="password" placeholder="Enter your password">
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="Submit" value="Submit">
</td>
</tr>
</table>
</form>
</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "id4422530_123";
$password = "Espn@12345";

// Create connection
$conn = mysqli_connect($servername,$username, $password,'id4422530_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['name'])&&isset($_POST['password'])){
	if(!empty($_POST['name'])&&!empty($_POST['password'])){
		
	}
	else{
		?>
		<script>
		alert("Please insert all details");
		</script>
		<?php
	
		}
		$username=$_POST['name'];
		 $password=$_POST['password'];
		
		if($username=="admin"&&$password=="admin"){
			$_SESSION['name']=$username;
			header('Location: admin.php');
		}
		else{
			?>
			<script>
			alert("Incorrect username or password");
			</script>
			<?php
		}

}
?>
