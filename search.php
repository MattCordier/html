
<?php 

	include 'ecomm_connect.php';
    $pdo = Database::connect();
    $searchField = $_GET['searchField'];
    $search = "%".$searchField."%";
                

    $sql = "SELECT * FROM trip WHERE name= ?";
    	$q = $pdo->prepare($sql);
        $q->execute(array($search));
        $data = $q->fetch(PDO::FETCH_ASSOC);
    	echo "<script>console.log('" . $sql . "');</script>";

      // foreach ($pdo->query($sql) as $row) {
      //  	echo '<div class= col-sm-4>';
      //   echo '<h2>'. $row['name'] . '</h2>';
      //   echo '<p>'. $row['description'] . '</p>';
      //   echo '<p>'. '$'. $row['cost'] . '</p>';
      //   echo '</div>';
               
      //  }
       Database::disconnect();


?>

