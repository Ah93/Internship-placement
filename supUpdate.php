<html>
<?php
$conn = oci_connect('system', '123', 'localhost/XE');
session_start();
if(isset($_POST['save'])){
	
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$telno = $_POST['TelNo'];
	$areaincharge = $_POST['AreaInCharge'];
	}
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$sid = $_GET['sid'];
$strSQL = "SELECT * FROM PRODUCT where ID = '$sid' ";
$objParse = oci_parse ($conn, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);


//require "showStaffInfo.php";


	


?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
  <body>
  <nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="sup.php">Supervisor <span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="Company.php">Company <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
					<li ><a href="Student.php">Student <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-education"></span></a></li>
					<li ><a href="Summary.php">Summary1 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
					<li ><a href="Summary2.php">Summary2 <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-map-marker"></span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	 <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="update.php">
<legend>Supervisor</legend>
<div class="form-group">
<label for="Staffid" class="col-sm-1">Product ID</label>
    <div class="col-sm-4">
	<input type="text" class="form-control" name="id" value="<?php echo $sid ?>">
    </div>
    <label for="Name" class="col-sm-1">Product Name</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="Name" value="<?php echo $objResult["NAME"]?>">
    </div>
	</div>
	<div class="form-group">
     <label for="TelNo" class="col-sm-1">Category</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="TelNo" value="<?php echo $objResult["CATEGORY"] ?>">
    </div>
	<label for="Email" class="col-sm-1">Price</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="Email" value="<?php echo $objResult["PRICE"] ?>">
    </div>
	</div>
	<div class="form-group">
	<label for="AreaInCharge" class="col-sm-1">Quantity</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="AreaInCharge" value="<?php echo $objResult["QUANTITY"] ?>">
    </div>
    </div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-warning btn-lg pull-right" name="save" id="submit">UPDATE</button>
		 <?php

}

?>
    </div>
    </div>
</form>
<?php

oci_close($conn);

?>
</body>
</html>