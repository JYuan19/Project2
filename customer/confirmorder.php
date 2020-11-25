<?php
include "../database/connection.php";
$generateid = uniqid();
session_start();  
if(isset($_SESSION['userEmail'])){
    $Email=$_SESSION['userEmail'];
}
if(isset($_POST["add"]))
{ 
  if(isset($_SESSION["cart"]))
  { 
    $item_array_id = array_column($_SESSION["cart"], "food_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["cart"]);
      $item_array = array(
        'food_id' => $_GET["id"],
        'food_name' => $_POST["hidden_name"],
        'food_price' => $_POST["hidden_price"],
        'c_id' => $_POST["hidden_c_id"],
        'food_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>alert("Added succesful!")</script>';
      echo '<script>window.location="cart.php"</script>';
    }   
    else
    {
      echo '<script>alert("This food already added to cart")</script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }
  else
  {
    $item_array = array(
      'food_id' => $_GET["id"],
      'food_name' => $_POST["hidden_name"],
      'food_price' => $_POST["hidden_price"],
      'c_id' => $_POST["hidden_c_id"],
      'food_quantity' => $_POST["quantity"],
    );
    $_SESSION["cart"][0] = $item_array;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Confirm Order</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <script src="js/confirm.js"></script>
    <script src="js/empty.js"></script>
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php"; 
        ?>        
    </header>
    <?php
if(!empty($_SESSION["cart"]))
{
  ?>
    <div class="container">
        <div class="container" style="margin-top:7%;">
            <h1>Checkout</h1>
            <p style="font-size:1.3em">Checkout your order before making purchase</p>
            <hr>
        </div>
        <div class="container">
        <div class="table-responsive" >
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th width="10%">Food Name</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Price Details</th>
                    <th width="5%">Order Total</th>
                    </tr>
                </thead>

                <?php  
                    $total = 0;
                    foreach($_SESSION["cart"] as $keys => $values)
                    {
                ?>
                <tr>
                    <td><?php echo $values["food_name"]; ?></td>
                    <td><?php echo $values["food_quantity"] ?></td>
                    <td>RM <?php echo $values["food_price"]; ?></td>
                    <td>RM <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
                </tr>
                <?php 
                    $total = $total + ($values["food_quantity"] * $values["food_price"]);
                    $tax = $total*0.1;
                    $total2 = $total + $tax;
                    }
                ?>
                <tr>
                    <td colspan="2" ></td>
                    <td >Service Tax (10%)</td>
                    <td>RM <?php echo $total*0.1; ?></td>
                </tr>
                <tr>
                    <td colspan="2" ></td>
                    <td style="font-weight:bold;">Total (Incl. Service Tax)</td>
                    <td style="font-weight:bold;">RM <?php echo number_format($total2, 2); ?></td>
                </tr>
            </table>
            <h5>Would you like to give some message?</h5>
            <p>(The message will display on the receipt)</p>
            <form action="../database/cartid.php" method="POST">
              <div class="form-group" style="margin-top:5%;">
                  <h5>Message: (Limit 50 words)</h5>
                  <textarea class="form-control" rows="5" name="msg" id="msg" maxlength="50"></textarea>
              </div>
              <input type="text" class="form-control" name="order_id" value="<?php echo $generateid; ?>"  style="display: none;"/>
              <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['userEmail']; ?>"  style="display: none;"/>
              <button  type="submit" name="insert" class="btn btn-success pull-right">Checkout</button>
            </form>
            </div>
        </div>
    </div>
    
    <?php
    }
    ?>
    </body>
</html>
