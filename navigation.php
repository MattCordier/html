<div class="container">
  <nav class="navbar navbar-default">
      <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img class="logo" src="assets/img/apex_logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home </a></li>
        <li><a href="trips.php">Trips</a></li>
      </ul>  
      
      <ul class="nav navbar-nav navbar-right">
        
        <li><?php if(isset($_SESSION['userid'])){echo '<a href="settings.php">Settings</a>'; } ?></li>
        <li><?php if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Customer"){echo '<a href="cart.php">Cart</a>'; } ?></li>
        <li><?php if(!isset($_SESSION['userid'])){echo '<a href="login.php">Login</a>'; } ?></li>
        <li><?php if(!isset($_SESSION['userid'])){echo '<a href="signup.php">Sign Up</a>'; } ?></li>
        <li><?php if(isset($_SESSION['userid'])){echo '<a href="logout.php">Logout</a>'; } ?></li>

        <li class="status"><?php if(isset($_SESSION['userid'])){
                      echo "Hello ". $_SESSION['firstname']. ",". "<br/>". "You are logged in as a ". $_SESSION['permission'];
                    } ?></li>
        <li><form class="navbar-form navbar-right search" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search&hellip;" name="srch-term" id="srch-term">
        </div>
      </form></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</div><!-- /.container -->
