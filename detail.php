<?php
session_start();
$product_ids1 = array();
//session_destroy();
if(filter_input(INPUT_POST,'process')){
	echo "ok";
	
	
	if(!empty($_SESSION['process_cart']))
	{
	echo "ok1";
		$count = count($_SESSION['process_cart']);
		echo $count;
		$product_ids1 = array_column($_SESSION['process_cart'],'id');
	if(!in_array(filter_input(INPUT_GET,'id'),$product_ids1)){
	echo "ok2";
	$_SESSION['process_cart'][$count] = array
	(
		//'id' => filter_input(INPUT_GET,'id'),
		'name' => filter_input(INPUT_POST,'name'),
		'mobile' => filter_input(INPUT_POST,'mobile'),
		'address' => filter_input(INPUT_POST,'address')
		//'city' => filter_input(INPUT_POST,'city'),
		//'pincode' => filter_input(INPUT_POST,'pincode')
		
		);
	}
	else{
		echo "ok3";
	}
	}

	else{
		echo "ok4";
		$_SESSION['process_cart'][0] = array
		(
		//'id' => filter_input(INPUT_GET,'id'),
		'name' => filter_input(INPUT_POST,'name'),
		'mobile' => filter_input(INPUT_POST,'mobile'),
		'address' => filter_input(INPUT_POST,'address')
		//'city' => filter_input(INPUT_POST,'city'),
		//'pincode' => filter_input(INPUT_POST,'pincode')
		);
	}
}

//pre_r($_SESSION);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>
<? echo 'we don\t know'; ?>
<!DOCTYPE html>
<html>
<head>
<title> Detail </title>
 <link rel="stylesheet" type="text/css" href="detail.css">
</head>
	<body>
	<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $mobile = $address = $city = $pincode = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  //echo $name;
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
  if (!empty($_POST["mobile"])) {
    $mobile = test_input($_POST["mobile"]);
  }
  if (!empty($_POST["address"])) {
	$address = test_input($_POST["address"]);
  }
	if (!empty($_POST["city"])) {
	$city = test_input($_POST["city"]);
	}
	if (!empty($_POST["pincode"])) {
	$pincode = test_input($_POST["pincode"]);
	}
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
 

		<div class="login-box">
			<img src="2.png" class="avatar">
				<h1>  Detail </h1>  
				<form method="post"  action="bill.php" >
				<p>Name</p>
				<input type="text" name="name" value="<?php echo $name;?>"placeholder="name">
				<p>Email</p>
				<input type="text" name="email" value="<?php echo $email;?>" placeholder="email">
				<p>Mobile</p>
				<input type="text" name="mobile" value="<?php echo $mobile;?>" placeholder="mobile">
				<p>Address</p>
				<input type="text" name="address" value="<?php echo $address;?>"placeholder="address">
				<p>City</p>
				<input type="text" name="city" value="<?php echo $city;?>" placeholder="city">
				<p>pincode</p>
				<input type="text" name="pincode" value="<?php echo $pincode;?>" placeholder=" pincode">
				<input type="submit" name="process" value="Process">
				
		        </form>
				
		</div>
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
/*
echo $name;
echo $email;
echo $mobile;
echo $address;
echo $city; 
echo $pincode*/
$sql = "INSERT INTO `detail`(`name`, `email`, `mobile`, `address`, `city`, `pincode`) VALUES ('$name', '$email', '$mobile', '$address', '$city', '$pincode')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$query ="SELECT * FROM `detail`";
$result =mysqli_query($conn,$query);

if($result):
	if(mysqli_num_rows($result)>0):
		while($product = mysqli_fetch_assoc($result)):
		//print_r($product);

?>
<?php 

//$total = $total  +($product['quantity']*$product['price']);
endwhile;
endif;
endif;
$conn->close();
?>
<?php
if(!empty($_SESSION['process_cart'])):

  foreach($_SESSION['process_cart'] as $key => $product):
?> 
<?php 

//$total = $total  +($product['quantity']*$product['price']);
endforeach;
endif;
?>
 
</body>		
</html>

