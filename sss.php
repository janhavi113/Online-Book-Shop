<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
}

#navbar {
  overflow: hidden;
  background-color: #333;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}
</style>
</head>
<body>

<div class="header">
 <img src="f.jpg" width="1200" height="300">
</div>

<div id="navbar">
  <a class="active" href="javascript:void(0)">Home</a>
  <a href="c.php">Your Cart</a>
  
  
</div>

<div class="content">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="cart.css"/>
 <div class="container">
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

$query ="SELECT * FROM `shoppingcart`";
$result =mysqli_query($conn,$query);

if($result):
	if(mysqli_num_rows($result)>0):
		while($product = mysqli_fetch_assoc($result)):
		//print_r($product);

?> 
<div class="col-sm-4 col-md-3">
 <form method="post" action="index.php?action=add&id=<?php echo $product['id'];?>">
 <div class="products">
 <img src="<?php echo$product['image'];?>" class="img-responsive"/>
 <h4 class="text-info"><?php echo $product['name'];?></h4>
 <h4><?php echo $product['price'];?> ₹</h4>
 <input type="text" name="quantity" class="from-control" value="1" /><br>
 <input type="hidden" name="name" value="<?php echo $product['name'];?>"/>
 <input type="hidden" name="price" value="<?php echo $product['price'];?>"/>
 <input type="submit" name="add_to_cart" class="btn btn-info" value="Add to Cart"/>
 
 
 </div>
 </form>
</div>
<?php
endwhile;
endif;
endif;
$conn->close();
?>


</div>

 </div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>
<?php
//session_start();
$product_ids = array();

if(filter_input(INPUT_POST,'add_to_cart')){
	
	
	if(!empty($_SESSION['shopping_cart']))
	{
	
	
		$count = count($_SESSION['shopping_cart']);
		$product_ids = array_column($_SESSION['shopping_cart'],'id');
	if(!in_array(filter_input(INPUT_GET,'id'),$product_ids)){
	
	
	$_SESSION['shopping_cart'][$count] = array
	(
		'id' => filter_input(INPUT_GET,'id'),
		'name' => filter_input(INPUT_POST,'name'),
		'price' => filter_input(INPUT_POST,'price'),
		'quantity' => filter_input(INPUT_POST,'quantity')
		
		);
	}
	else{
		
		for($i = 0;$i < count($product_ids);$i++)
		{
			if($product_ids[$i]   ==filter_input(INPUT_GET,'id'))
			{echo "ok2";
				$_SESSION['shopping_cart'][$i]['quantity'] +=filter_input(INPUT_POST,'quantity');
			}
		}
	}
	}

	else{
		$_SESSION['shopping_cart'][0] = array
		(
		'id' => filter_input(INPUT_GET,'id'),
		'name' => filter_input(INPUT_POST,'name'),
		'price' => filter_input(INPUT_POST,'price'),
		'quantity' => filter_input(INPUT_POST,'quantity')
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
