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
  
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $password = $password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["username"])) {
	
	
    $uname=$_POST['username'];
    
    
    $sql="SELECT * FROM `shoppingcart` WHERE name='".$uname. "'limit 1";
    //echo $sql;
    $result=mysqli_query($conn,$sql);
    
	//echo $result;
   if(mysqli_num_rows($result)==1){
       
	   
	   
							include("detail.php");

        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}

}
/*
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/
?>
<!DOCTYPE html>
<html>
<head>
<title> Login </title>
 <link rel="stylesheet" type="text/css" href="style1.css">
</head>
	<body>
		<div class="login-box">
			<img src="avatar.png" class="avatar">
				<h1>  Login </h1>  
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<p>Bookname</p>
				<input type="text" name="username" value="<?php echo $name;?>" placeholder="Username"/>				
				<input type="submit" name="sign-up button" value="search">
				<a href="new.php"> Create account </a>
		         		 
				</form>
				<script>
				function validateForm() {
				  var x = document.forms["myForm"]["username"].value;
				  if (x == "") {
					alert("All must be filled out");
					return false;
				  }
				  var x1 = document.forms["myForm"]["password"].value;
				  if (x1 == "") {
					alert("All must be filled out");
					return false;
				}
				}
				</script>				
		</div>
		


			</body>
</html>

