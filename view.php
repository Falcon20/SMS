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
<form action="view.php" method="post" enctype="multipart/form-data">
<table class="table table-hover table-bordered">
<tr class="info">
<td>
<h4 align="center">Enter student name</h4>
</td>
<td>
<input type="text" name="sname" placeholder="Enter the name">
</td>
<td>
<span class="glyphicon glyphicon-search"></span>
<input type="submit" name="submit" value="Search">
</td>
<td>
<h5 align="center"><a href="admin.php"><button type="button" class="btn btn-primary btn-md">Admin Dashboard</button></a></h5></td>
<td>
<h4 align="center"><a href="logout.php"><button type="button" class="btn btn-primary btn-md">Logout</button></a></h5>
</td>
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
$servername = "localhost";
$username = "id4422530_123";
$password = "Espn@12345";

// Create connection
$conn = mysqli_connect($servername,$username, $password,'id4422530_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
	$name=$_POST['sname'];
	$qry="SELECT * FROM `student1` WHERE name like '$name%'";
	$run=mysqli_query($conn,$qry);
	if(mysqli_num_rows($run)<1)
	{?>
		<script>
		alert("No record Found");
		</script>
		<?php
	}
	else{
		?>
		<table class="table table-hover table-bordered table-condensed">
		<tr class="success">
			<td  align="center">Name</td>
			<td align="center">Email</td>
			<td align="center">Roll no</td>
			<td align="center">Contact No.</td>
			<td></td>
			<td></td>
		</tr>
		<?php
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			<tr>
			<td align="center"><img src="./dataimg/<?php echo $data['image'] ?>" class="img-rounded img-responsive" alt="image not present" height="100px" width="80px" ><br>
			<?php echo $data['name'];?>
			</td>
			<td align="center"><?php echo $data['email'];?></td>
			<td align="center"><?php echo $data['rollno'];?></td>
			<td align="center"><?php echo $data['contactno'];?></td>
			<td><a href="update.php?rollno= <?php echo $data['rollno']?>">Edit</a></td>		
						<td><a href="delete.php?rollno= <?php echo $data['rollno']?>">Delete</a></td>		

			</tr>
			
			<?php
		}	
			
		}
	}	
	
?>