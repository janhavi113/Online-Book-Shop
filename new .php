<html>

<head>

</head>
	<body>
		<div id="login-box">
			<div class="left-box">
			<h1><center>Sign Up </h1>
					   <input type="text" name="username" placeholder="Username"/>
					   <input type="text" name="email" placeholder="Email"/>
					   <input type="password" name="password" placeholder="Password"/>
					   <input type="password" name="password2" placeholder="RetypePassword"/>
					   
					   <input type="submit" name="sign-up button" value="sign-up"/>
			</div>
			   <div class="right-box">
				   <span class="Signwith">Sign in with <br/>Social Network
				   </span>
				   <button  class="social facebook">Log in with Facebook </button>
				   <button  class="social twitter">Log in with Twitter </button>
				   <button  class="social google">Log in with Google </button>
				   </div>
		</div>
	</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

?> 