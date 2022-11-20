
<?php
//user order page after choosing the products from the his basket. it will store the values in the database @orders in basket.db
	session_start();

	$connect = mysqli_connect('db:3306', 'root', 'Ip38w#*5tA%hwJLy', 'comp3335');
	if ($connect->connect_error) {
 	 die("Database connection failed: " . $connect->connect_error);
	}


	// REGISTER USER

if (isset($_POST['order_user'] )) {

		$user =  $_POST['user'];

		$category =$_POST['category'];
		
		$product = $_POST['product'];	
		
		$quantity =  $_POST['quantity'];
		
		$price = $_POST['price'];
		

		$fields = ["$user", "$category", "$product","$quantity","$price"];
$params = [];
foreach($fields as $field) {

    $params[":$field"] = $_POST[$field];
}

$pdo = new PDO("mysql:host=db:3306;dbname=comp3335", 'root', 'Ip38w#*5tA%hwJLy');
$sth = $pdo->prepare('
    INSERT INTO orders VALUES(:user, :category, :product, :quantity, :price);
');
$sth->execute($params);

		echo $user;



}	

	
?>


