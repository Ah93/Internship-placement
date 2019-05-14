<?php
//$conn = oci_connect("system","123","//localhost/xe"); // Includes Login Script
 // Includes Login Script

include ('login1.php');
 if(isset($_SESSION['login_user'])){
header("location: sup.php");

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->
<style>
  body{
    background: radial-gradient(rgba(0,0,0,0.3),rgba(0,0,0,1)), url("pic\Internship2.jpg");
    background-size: 100%;
      
  }
  .white-font{
    color: white;
  }
  .btn-inverse{
    background-color:  rgba(0,0,0,0);
      color: white;
  }
</style>



</head>
<body>
  <header>
    <nav class="navbar navbar-reverse" style="margin-bottom:0;" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="pic\logo_ftmk2.png" width="100" height="50"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><button class="btn btn-inverse navbar-btn btn-block" data-toggle="modal" data-target="#signInModal">Sign In</button></li>
            <li><button class="btn btn-inverse navbar-btn btn-block" onClick="window.location.href='signUpPage.php'" >Sign Up</button></li>
            <li><button class="btn btn-info navbar-btn btn-block"  onclick="window.location.href='employers.php'">Employers</button></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>

  <content >
  
    <div class="col-md-3"></div>
    <div id="carousel-example-generic" class="carousel slide col-md-6" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner " role="listbox">
        <div class="item active ">
          <img src="pic\Internship.jpg" alt="...">
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item ">
          <img src="pic\Internship1.jpg" alt="...">
          <div class="carousel-caption">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </content>
  <div class="container">
    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
      <img src="pic\internship_icon1.png" class="img-responsive" width="304" height="236">
      <h3 class="white-font">Fast Internship</h3>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
      <img src="pic\internship_icon1.png" class="img-responsive" width="304" height="236">
      <h3 class="white-font">Fast Internship</h3>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
      <img src="pic\internship_icon1.png" class="img-responsive" width="304" height="236">
      <h3 class="white-font">Fast Internship</h3>
    </div>
  </div>


  <!--Modal-->
  <div class="modal fade" id="signInModal" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Log In</h4>
         </div>
        <div class="modal-body">
          <form role="form" action="login1.php" method="post">
            <div class="form-group">
              <label for="inputEmail1">Admin ID</label>
              <input type="text" class="form-control" name="adminId" placeholder="Admin ID" required>
            </div>

            <div class="form-group">
              <label for="passwordInput">Password</label>
              <input type="password" class="form-control" 
                     name="password" placeholder="Password" required>
            </div>
			<div class="form-group">
              <label for="numberInput"><?php echo "$random1 + $random2 ="; ?></label>
              <input type="text" name="numberInput" required>
            </div>
            <input class="btn btn-info btn-block" type="submit" name="submit" value = "Sign In">    
          </form>
        </div>
      </div>
    </div>
  </div>



</body>
</html>