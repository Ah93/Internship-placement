<!DOCTYPE html>
<?php

include ('session.php');
$adminId = $_SESSION['login_user'];
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
	<header>
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
				<li class="active"> <a class="navbar-brand" href=""><?php echo "$adminId"; ?></a></li>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="sup.php">Supervisor <span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li class="active"><a href="Company.php">Company <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
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
	</header>
	<?php

$objConnect = oci_connect("system","123","//localhost/xe");

$strSQL = "SELECT * FROM company";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);

?>
	<body>
<div class="container">
  <h2>List of companies details</h2>
             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="col-sm-1">Company_Id</th>
        <th class="col-sm-1">Company_Name</th>
        <th class="col-sm-1">Contact_Person</th>
		<th class="col-sm-1">Tel_No</th>
		<th class="col-sm-1">Fax_No</th>
		<th class="col-sm-1">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
            <td><?php echo $objResult["COMPANYID"];?></td>
      <td><?php echo $objResult["COMPANYNAME"];?></td>
      <td><?php echo $objResult["CONTACTPERSON"];?></td>
      <td><?php echo $objResult["TELNO"];?></td>
      <td><?php echo $objResult["FAXNO"];?></td>
      <td><?php echo $objResult["EMAIL"];?></td>
	  <?php

}

?>
      </tr>
    </tbody>
  </table>
</div>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>