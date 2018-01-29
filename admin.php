<html>
<head>
<link rel ="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body style="background-image: url('./about.jpg');">
	<div class="page-header well well-sm">
  <h2 align="center">Welcome to Admin Dashboard </h2>
  <h5 align="center">
  <a href="insert.php"><button type="button" class="btn btn-primary">Insert</button></a>
  <a href="view.php"><button type="button" class="btn btn-primary">View/Update</button></a>
  <a href="logout.php" ><button type="button" class="btn btn-primary">Logout</button></a>
  </h5>
</div>
</body >
</html>
<?php
session_start();
if(!$_SESSION['name']){
	header('location:index.php');
}?>

<?php
?>
