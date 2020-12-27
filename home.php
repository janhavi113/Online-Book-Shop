<!DOCTYPE html>
<html>
<head>
<title> Signup Form Design Tutorial </title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<div id="login-box">
			<div class="left-box">
			<h1><center>Sign Up </h1>
			</div>
			   <div class="right-box">
			 </div>
				  
		</div>
		
		<h1>HOME</h1>
		<div><h4> welcome <?php echo $_SESSION['username'];?> </h4></div>
		
	</body>
</html>

<?php
session_start();
?> 