<!DOCTYPE html>
<html>
<head>
<title> Signup Form Design Tutorial </title>
 <link rel="stylesheet" type="text/css" href="style1.css">
</head>
	<body >
	
	<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $password = $password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
 
  //if ($_POST["password"] == $_POST["password2"])) {
    $password = test_input($_POST["password"]);
  //} else {
   //  $emailErr = "Email is required";
    // check if e-mail address is well-formed
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //$emailErr = "Invalid password format"; 
    //
 // }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 
     
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div id="login-box">
					   <div class="right-box">
				   <h1><center>log in </h1>
				   
					   <input type="text" name="username" value="<?php echo $name;?>" placeholder="Username"/>				
					   <input type="password" name="password" placeholder="Password"/>
					   <input type="submit" name="sign-up button" value="Log in"/>
				   </div>
				 
		</div>
		</form>
		
		
		
		
		<?php
$servername = "localhost";
$username = "root";
$ppassword = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $ppassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "INSERT INTO `registration`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";

//if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
//} else {
 //   echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();
?> 

	</body>
</html>
