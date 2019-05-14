<?php
$conn = oci_connect("system","123","//localhost/xe");
session_start();
//$adminId = $_GET['adminId'];
//$ADMINID = $get2['adminId'];
include 'session.php';
$username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
#$get = oci_parse($conn, "SELECT * FROM ADMIN WHERE ADMINID ='$adminId'");
#$get2 = oci_execute($get);
//$get2 = oci_fetch_assoc($get);

?>
<!DOCTYPE html>
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
				 <a class="navbar-brand" href=""><?php echo "$username"; ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php">Product<span style="font-size:16px;" class=" hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="readStudent.php">Customers <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					<li ><a href="reportDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM report WHERE REPROT_DATE >= sysdate - (180/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Report<span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
					<li ><a href="orderDisplay.php">
					<?php
                        // query to count all product in cart
                        $query = "SELECT count(*) FROM order_pro WHERE order_date >= sysdate - (200/1440)";
                         $result = oci_parse($conn,$query);

                         oci_execute ($result,OCI_DEFAULT);
                             while($row = oci_fetch_array($result,OCI_BOTH)){
                        // return count
                        $cart_count=$row[0];
							 }
                        ?>
					Orders<span class="badge" id="comparison-count"><?php echo $cart_count; ?></span></a></li>
	
				</ul>
				<li ><a href="orderDetails.php">Order Details<span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="logOut.php">Logout <span style="font-size:16px;" class="hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	</header>
	<?php

$objConnect = oci_connect("system","123","//localhost/xe");

$strSQL = "SELECT  orr.order_id,o.customer_id,c.FIRST_NAME,C.LAST_NAME,ci.product_id,p.name,P.PRICE,ci.quantity,ci.quantity * p.price AS subtotal,o.order_date
from order_pro o,customer c,cart_item ci,product p,order_details orr
where c.id = o.customer_id
and p.id = ci.product_id
and orr.order_id = o.order_id
and orr.cart_id = ci.id";

$objParse = oci_parse ($objConnect, $strSQL);

oci_execute ($objParse,OCI_DEFAULT);

?>
	<div class="container">
<form class="form-horizontal" id="form_members" role="form" method="post" action="supupdate.php">
  <h2>Customers Orders</h2>
  <hr>
  <div style="width:300px;float:right;text-align:right">
	  <a href='exportPro.php' class='btn btn-primary'>
	  <span class='glyphicon glyphicon-download-alt'></span>Export</a>
	  <br>
	  <br>
  </div>
  
  <p></p>
  <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">Order ID</th>
                <th class="col-sm-1">Customer_id</th>
                <th class="col-sm-1">First Name</th>				 
                <th class="col-sm-1">Last Name</th>
                 <th class="col-sm-1">Product Id</th>
				 <th class="col-sm-1">Name</th>
                <th class="col-sm-1">Price</th>
                <th class="col-sm-1">Quantity</th>				 
                <th class="col-sm-1">Subtotal</th>
                 <th class="col-sm-1">Order Date</th>			 				
            </tr>
        </thead>
        <tbody>
         <tbody>
		  <?php

while($objResult = oci_fetch_array($objParse,OCI_BOTH))

{

?>
            <tr>
      <td><?php echo $objResult[0];?></td>
	  <td><?php echo $objResult[1];?></td>
      <td><?php echo $objResult[2];?></td>
      <td><?php echo $objResult[3];?></td>
	  <td><?php echo $objResult[4];?></td>
	  <td><?php echo $objResult[5];?></td>
	  <td><?php echo $objResult[6];?></td>
      <td><?php echo $objResult[7];?></td>
      <td><?php echo $objResult[8];?></td>
	  <td><?php echo $objResult[9];?></td>
	  <?php

}

?>
      </tr>
       </tbody>
    </table>
	<?php

oci_close($objConnect);

?>
</form>
       </body> 
</div>
  </div>
	</html>