<?php

//connection to database
 session_start();
	$connect = mysqli_connect('db:3306', 'root', 'Ip38w#*5tA%hwJLy', 'product');
  echo "<body style='background-color:grey'>";
	echo "<h1>Hi   ".$_SESSION['username']." <br> welcome to portal <br> <h3>Here you can add/remove as many as products/quantity into basket<br></h3><br> <h4>please click on logout button once you had done shopping </h4></h1>";
	
 

//add item to cart
    if(isset($_POST["add_to_cart"]))
    {
      if(isset($_SESSION["shopping_cart"]))
      {
        // an arry store item
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
            //get all item detail
            $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'product_img'     =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
		                	'item_name2'     =>   $_POST["hidden_name2"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
            $_SESSION["sale"][$count] = $item_array;
        }
        else
        {
          //if product added then this block 
          echo '<script>alert("Already added ")</script>';
          echo '<script>window.location = "index.php"</script>';
        }
      }
      else
      {
        //if sale is empty excute this block
         $item_array = array(
                      'item_id'       =>   $_GET["id"],
                      'product_img'     =>   $_POST["hidden_image"],
                      'item_name'     =>   $_POST["hidden_name"],
			                'item_name2'     =>   $_POST["hidden_name2"],
                      'item_price'    =>   $_POST['hidden_price'],
                      'item_quantity' =>   $_POST["quantity"]

            );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
//Remove sale in basket 
    if(isset($_GET["action"] ))
    {
      if($_GET["action"] == "delete" )
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["id"])
              {		
               unset($_SESSION["shopping_cart"][$key]);
               echo '<script>alert("sale removed")</script>';
                echo '<script>window.location="index.php</script>';
              }
      }      
     } 
    }
 
    if(isset($_GET["action"] ))
    {
      if($_GET["action"] == "add" )
      {
        foreach($_SESSION["shopping_cart"] as $key=>$value)
            {
              if($value["item_id"] == $_GET["id"])
              {

		$item_id= mysqli_real_escape_string($connect, $_POST['key']);	

			$query = "INSERT INTO orderstest (item_id) 
					  VALUES('$item_id')";
      mysqli_query($connect, $query);
      if($query){
        echo 'success';
        }
        else
       {
          echo 'not success';
      	}
}
}}}

?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Available stock</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <a href = "logout.php">logout</a>
           <div class="container" style="width:700px;">  
                <h3 align="center">Available stock online</h3><br />  
                  <?php
                    $qury = "SELECT * FROM products ORDER BY id ASC";
                    $result = mysqli_query($connect,$qury);
                    if(mysqli_num_rows($result) >0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {

                  ?>
                <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"];?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="/image/<?php echo $row['image'];?>" class="img-responsive" style="    width: 100px;" /><br />  
                               <h4 class="text-info"><?php echo $row['category'];?></h4>  
				                        <h4 class="text-info"><?php echo $row['product'];?></h4> 
                               <h4 class="text-danger">€<?php echo $row['price'];?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />
 				                        <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row['category'] ?>" />
			                          <input type="hidden" name="hidden_name2" value="<?php echo $row['product'] ?>" />
                             <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">


                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                  <?php } } ?>
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details <b style="color: red"></b></h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr> 
                              <th>product image</th>
                              <th width="40%">Category</th>
                              <th width="40%">product</th>  
                              <th width="10%">Quantity</th>  
                              <th width="20%">Price</th>  
                              <th width="15%">Total</th>  
                              <th width="5%">Action</th>  
                          </tr>  
                             <?php 
                           if(!empty($_SESSION["sale"]))
                           {
                            $total = 0;
                            foreach($_SESSION["sale"] as $key => $value)
                           {

                             ?>

<form method="post" action="index.php"<?php echo $_SESSION['username'];?>">
<tr> 
    <td><img src="/image/?php echo $value['product_img'];?>" style="width: 100px;"> </td>    
    <td><input type="text" name="user" value="<?php echo $_SESSION['username'];?>" readonly </td>   
    <td><input type="text" name="category" value="<?php echo $value ['item_name'];?>"readonly</td> 
		<td><input type="text" name="product" value="<?php echo $value['item_name2'];?>" readonly </td>
    <td><input type="text"name="quantity" value="<?php echo $value['item_quantity']; ?>" readonly </td>  
    <td><input type="text"name="price" value="€<?php echo $value['item_price'];?>" readonly </td>  
    <td>$<?php echo number_format($value["item_quantity"] * $value["item_price"],2);?> </td> 
    <td><a href="index.php?action=delete&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">Remove</span></a></td> 
    <td><a href="index.php?action=add&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">add</span></a></td>  
    <!--<td><a href="index.php?submit1=add&id=<?php  echo $value['item_id'];?>"><span class="btn btn-danger">add</span></a></td> -->      
    <td><input type="submit" name="" style="margin-top:5px;" class="btn btn-success" value="Order" />  </td>
      </div>  
                     </form>              
                          <?php $total = $total + ($value["item_quantity"] * $value['item_price']);
                        }
                        ?>
                           
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">€<?php echo number_format($total);?>
                            <td> <?php echo $_POST['name'].$_POST['quantity'] .$_POST['price'];} ?> </td>   
                          </tr> 
<p><a href="logout.php"> logout</a></p>
                        

                           
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>
