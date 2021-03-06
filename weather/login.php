<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start(); 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matt Cordier">
        <meta name="description" content="A smart weather app for planning your travels.">
        <link rel="stylesheet" href="assets/css/skeleton.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">        

        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons.min.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons-wind.min.css">

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->    
    </head>
    <body class="login-bg">

        <div class="wrapper">
            <header id="main-header">
                <a href="index.php" class="login-link">view map</a>
            </header>    
            <div id="weather" class="container login-container">

                <h1 class="register-heading">Login to your account</h1>
                
                <script>
                  window.fbAsyncInit = function() {
                      FB.init({
                        appId      : '1688543628082268',
                        cookie     : true,  // enable cookies to allow the server to access 
                                            // the session
                        xfbml      : true,  // parse social plugins on this page
                        version    : 'v2.5' // use graph api version 2.5
                      });

                      FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                      });

                      };
                  // This is called with the results from from FB.getLoginStatus().
                  function statusChangeCallback(response) {
                    console.log('statusChangeCallback');
                    console.log(response);
                  
                    if (response.status === 'connected') {
                      // Logged into your app and Facebook.
                      testAPI();
                    } else if (response.status === 'not_authorized') {
                      // The person is logged into Facebook, but not your app.
                      document.getElementById('status').innerHTML = '';
                    } else {
                      // The person is not logged into Facebook, so we're not sure if
                      // they are logged into this app or not.
                      document.getElementById('status').innerHTML = 'Please log ' +
                        'into Facebook.';
                    }
                  }


                    function checkLoginState() {
                      FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                      });
                    }

                    

                    // Load the SDK asynchronously
                    (function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/sdk.js";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                    // Here we run a very simple test of the Graph API after login is
                    // successful.  See statusChangeCallback() for when this call is made.
                    function testAPI() {
                      console.log('Welcome!  Fetching your information.... ');
                      FB.api('/me', function(response) {
                        console.log(response.authResponse);
                        var fb_data = {
                          "fb_name" : response.name 
                          // "fb_id" : authResponse.userID
                        };

                        $.ajax({
                          type : "POST",
                          url : 'includes/process_login.php',
                          data : fb_data,
                          success : function(data){
                            // alert("yep");
                          }
                        });
                        document.getElementById('status').innerHTML =
                          '<p>Thanks for logging in, ' + response.name + '!</p>';

                      });
                    }
                  </script>
<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
            <div > 
                <form class"app-form" action="includes/process_login.php" method="post" name="login_form">                      
                    <div class="input-group">
                        <input type="email" name="email" />
                        <label for="email">Email</lable>
                    </div>
                        

                    <div class="input-group">    
                        <input type="password"  name="password" id="password"/>
                        <label for="password">Password</lable>
                    </div>
                    <br/>
                    <input class="btn btn-default login-btn form-btn" type="submit" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                    <br/>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>
                </form>
                

                <div id="status">
                </div>
            </div>
           
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.';
 
            echo 'Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "</p>Don't have an account? <a id='register' href='register.php'>Register here</a></p>";
                }

?>
        </div>
        </div>
        <footer id="main-footer">
            <p class="foot-deets">Weather App developed by <a href="http://mattcordier.github.io" target="_blank">Matt Cordier.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Powered by <a href="http://forecast.io" target="_blank">Forecast.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matt Cordier &copy; 2016</p>
        </footer>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/forms.js"></script>
       <!-- <script src="assets/js/maps.js"></script> -->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
      <!--   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&libraries=places"></script>   -->
    </body>
</html>