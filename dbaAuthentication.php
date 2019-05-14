<?php

	if (isset($_POST['submit'])) {
	    if($_POST['dbaPassword'] == '1'){
	    	header('Location: dbaIndex.php');
	    }
	  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>DBA Authentication</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class=" container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h3 class="title text-centered">DBA Authentication</h3>
				<form method="post" action="">
					<label for="tableSelection" class="control-label">Password</label>
					<input type="password" name="dbaPassword" placeholder="Password">
					<input type="submit" name="submit" value="Submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	  <script src="jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>