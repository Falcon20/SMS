<html>
<head>
<link rel ="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
</body>
</html>
<?php
session_start();
session_destroy();
header('location:index.php');
?>