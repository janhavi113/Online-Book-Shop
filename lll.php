<?php 
$servername = "localhost";
$username = "root";
$ppassword = "";
$db = "project";

$conn = new mysqli($servername, $username, $ppassword, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  echo "ok";
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $password = $password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["username"])) {
	echo "ok1";
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from `registration` where name='".$uname."'AND password='".$password."' limit 1";
    //echo $sql;
    $result=mysqli_query($conn,$sql);
    
	//echo $result;
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="lll.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
	<div class="container">
	<img src="books.png"/>
		<form method="post" action="#">
		<div class="form-input">
		<input type="text" name="username" placeholder="Enter the User Name"/>	
		</div>
		<div class="form-input">
		<input type="password" name="password" placeholder="password"/>
		</div>
		<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>