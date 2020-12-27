<?php
session_start();
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
			{
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
if(filter_input(INPUT_GET,'action')=='delete')
{
	foreach($_SESSION['shopping_cart']as $key => $product)
	{
		if($product['id']== filter_input(INPUT_GET,'id')){
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}
//pre_r($_SESSION);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Shopping cart </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="cart.css"/>
</head>
<body>
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

<?php
endwhile;
endif;
endif;

?>

<div style="clear:both"></div>
<br />
<div class="table-responsive">
<table class="table">
<tr><th colspan = "5"><h3>Order Details</h3></th></tr>
<tr>
<th width="40%">Product Name </th>
<th width="10%">Quantity</th>
<th width="20%">Price</th>
<th width="15%">Total</th>
<th width="5%">Action </th>
</tr>
<?php
if(!empty($_SESSION['shopping_cart'])):
 $total = 0 ;
  foreach($_SESSION['shopping_cart'] as $key => $product):
?> 
<tr>
<td><?php echo $product['name'];?></td>
<td><?php echo $product['quantity'];?></td>
<td><?php echo $product['price'];?></td>
<td><?php echo number_format($product['quantity']*$product['price'],2);?></td>
<td>
<a href="index.php?action=delete&id=<?php  echo $product['id'];?>">

<div class="btn-danger">Remove</div></a>
</td>
</tr>
<?php 

$total = $total  +($product['quantity']*$product['price']);
endforeach;
?>
<tr>
<td colspan="3" align="right">total</td>
<td align="right"><?php echo number_format($total,2); ?></td>
<td></td>
</tr>
<td colspan-"5">
<?php
if(isset($_SESSION['shopping_cart'])):
if(isset($_SESSION['shopping_cart'])>0):
?>
<a href="l.php" class="button">Checkout</a>

<a href="c.php">
<div class="button">continue shopping</div></a>

<?php endif; endif;?>
</td></tr>
<?php
endif;
$conn->close();?>
</table>
</div>
</div>

</body>
</html>