
<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>

<body>
<?php require "navigation.php";
require "CRUD/customer/create_customer.php";
	


	


	
Database::disconnect(); ?>
<?php require "footer.php";?>
</body>

</html>