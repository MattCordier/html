
<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>

<body>
	<div class="container main-bg">
<?php require "navigation.php";?>

	<form id="login" action="authorize.php" method="POST" enctype="multipart/form-data">
		User Name:
		<input id="username" type="text" name="username">
		Password:
		<input id="password" type="password" name="password">
		<input id="logbtn" class="btn" type="submit" value="Log In">
	</form>
	<div id="confirmlog"></div>

</div>


	


	
<?php Database::disconnect(); ?>
<?php require "footer.php";?>
</body>

</html>