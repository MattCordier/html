<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>
<body>
<?php session_start();?>
<?php require "navigation.php";?>
 	<div id="pallet" class="container main-bg">
        <div class="row">
            <h3>Select a Trip</h3>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
					<label for="sel1">Hiker Style:</label>
					  <select id="style" class="form-control">
					  	<option value="all" selected="selected"> All </option>
		<?php		  			 
			$sql = 'SELECT * FROM style ORDER BY name';
			foreach ($pdo->query($sql) as $row) {
			    echo '<option value=" ' .$row['id']. ' ">'. $row['name'] . '</option>';
			}
		?>
					  </select>
				</div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
  					<label for="sel1">Destination:</label>
					  <select id="destination" class="form-control">
						<option value="all" selected="selected"> All </option>
		<?php
           $sql = 'SELECT * FROM destination ORDER BY name';
           foreach ($pdo->query($sql) as $row) {
                    echo '<option value=" ' .$row['id']. ' ">'. $row['name'] . '</option>';
           }
        ?>
					  </select>
				</div>
			</div>   
        </div><!--end row-->
        
        <div class="row">
            <div id="trips" class="col-xs-12">    

            </div>
        </div><!--end row-->
    
        </div> <!-- /container -->

    <div id="tripsearch" class="container main-bg">
        <div class="row">
        	<div  class="col-xs-12">	

        	</div>
        </div><!--end row-->
    </div>
    


<?php Database::disconnect(); ?>

<?php require "footer.php";?>
<script src="assets/js/script.js"></script>
</body>

</html>