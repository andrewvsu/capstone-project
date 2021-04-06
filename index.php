<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "../cgi/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Mediship</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
  


  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Mediship <i class="fas fa-box-open"></i></a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">IT Support <i class="far fa-question-circle"></i></a>
          </li>
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search Site" aria-label="Search ">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <section>
      <div class="jumbotron text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1>Mediship Company Intranet</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, deleniti, ea nisi suscipit atque tempore aspernatur harum unde veritatis neque rem dolores assumenda. Recusandae facilis dolores cum iste assumenda accusamus.</p>
                
              <div class="col-md-6 offset-md-3 login-form offset-xl-4 col-xl-4" >

                <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                
                <input type="text" name="username" placeholder="Your Email *" class="form-control  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                
                <input type="password" name="password" placeholder="Your Password *" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p><a href="reset-password.php">Forget Password? </a></p>
        </form>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1>Medical Logistics </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, magni, doloribus, possimus eum sapiente deleniti doloremque fugit ut expedita molestiae iusto debitis eveniet modi obcaecati ipsam quos quis labore dicta.</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container mt-2">
        <div class="row">
          <div class="col-md-4 col-12">
            <ul class="list-unstyled">
              <li class="media">
                <i class="fas fa-compass mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0 mb-1">Directory of Facility Locations</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-4 col-12">
            <ul class="list-unstyled">
              <li class="media">
                <i class="fas fa-user-plus mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0 mb-1">New Hire Onboarding</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-4 col-12">
            <ul class="list-unstyled">
              <li class="media">
                
                <i class="fas fa-door-open mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0 mb-1">Human Resources</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
<hr>
<hr>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-12 col-xl-6">
            <h3 class="text-center">MISSION STATEMENT</h3>
            <p>Mediship is a Christian-based organization that provides medical supplies to both the United States and Canada. Headquartered in Arizona, this startup company has consistently applied Christ's teachings for all business operations. </p>
          </div>
          <div class="col-md-4 col-12 col-xl-6">
            <h3 class="text-center">MEDISHIP CORPORATE OFFICE</h3>
            <address class="text-center">
              <strong>Mediship Company</strong><br>
              Sunny Autumn Plaza, Grand Coulee,<br>
              AZ, 81408-3015, US<br>
              <abbr title="Phone">P:</abbr> (555) 545-7895
            </address>
          </div>
          
        </div>
      </div>
    </div>
    <hr>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © Mediship. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
  integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="./js/app.js"></script>
	  
  </body>
</html>