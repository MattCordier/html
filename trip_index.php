
            <div class="row">
                <h3>Manage Trips</h3>
            </div>
            <div class="row">
                <p>
                    <a href="trip_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Trip Name</th>
                      <th>Cost</th>
                      <th>Description</th>
                      <th>Style</th>
                      <th>Destination</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM trip ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['cost'] . '</td>';
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['style_id'] . '</td>';
                            echo '<td>'. $row['destination_id'] . '</td>';
                            
                            echo '<td width=250>';
                                echo '<a class="btn" href="trip_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="trip_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="trip_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        <div class="row">
                <h3>Manage Customer</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create_customer.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
          <th>Last Name</th>
                      <th>Phone</th>
                      <th>Date of Birth</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customer ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['firstname'] . '</td>';
                            echo '<td>'. $row['lastname'] . '</td>';
                            echo '<td>'. $row['phone'] . '</td>';
                            echo '<td>'. $row['dob'] . '</td>';
                            echo '<td width=250>';
                                echo '<a class="btn" href="customer_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="customer_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="customer_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    