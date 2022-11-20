<?php include('order.php')
//After adding into basket this will redirect to validate page as this will show all the information that user did choose.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Esigelec sales portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
<H1> validate order </H1>
		<h2>please verify</h2>
	</div>
	
	<form method="post" action="order.php">

		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>user</label>
			<input type="text" name="user" value="<?php echo $_POST['user']; ?>">
		</div>

		<div class="input-group">
			<label>category</label>
			<input type="text" name="category" value="<?php echo $_POST['category']; ?>">
		</div>
		<div class="input-group">
			<label>product</label>
			<input type="text" name="product" value="<?php echo $_POST['product']; ?>">
		</div>
		<div class="input-group">
			<label>quantity</label>
			<input type="text" name="quantity" value="<?php echo $_POST['quantity']; ?>">
		</div>
			<div class="input-group">
			<label>price</label>
			<input type="text" name="price" value="<?php echo $_POST['price']; ?>" >
		</div>
		
			

		
		<div class="input-group">
			<button type="submit" class="btn" name="order_user">Register</button>
		
	</form>
</body>
</html>
