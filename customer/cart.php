<?php
include "../database/connection.php";
$generateid = uniqid();
session_start();  
if(isset($_SESSION['userEmail-foodtiger'])){
    $Email=$_SESSION['userEmail-foodtiger'];
    $Address=$_SESSION['Address'];
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
      'food_image' => $_POST["hidden_image"],
      'food_price' => $_POST["hidden_price"],
      'food_description' => $_POST["hidden_description"],
      'food_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][$count] = $item_array;
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
    'food_image' => $_POST["hidden_image"],
    'food_price' => $_POST["hidden_price"],
    'food_description' => $_POST["hidden_description"],
    'food_quantity' => $_POST["quantity"],
    );
    $_SESSION["cart"][0] = $item_array;
  }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    <script src="../js/empty.js"></script>
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";

          if(isset($_SESSION['userEmail-foodtiger']))
          {
            require "chat.php";
          } 
        ?>        
    </header>
    <?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron" style="margin-top:5%;">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
      </div>
      
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="table-responsive">
            <table class="table table-striped" style="box-shadow: 7px 3px 15px #888888">
              <thead class="thead-dark">
                <tr>
                  <th width="25%">Food Name</th>
                  <th width="10%">Quantity</th>
                  <th width="25%">Price Details</th>
                  <th width="20%">Order Total</th>
                  <th>Action</th>
                  
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
                <td>
                  <a href="UpdateCartpage.php?id=<?php echo $keys; ?>"><button class="btn btn-warning" style="font-size:0.8em;color:white;"><i class="fas fa-edit"></i></button></a> | 
                  <a href="../database/cartcode.php?action=delete&id=<?php echo $keys; ?>"><button class="btn btn-danger" style="font-size:0.8em" onclick="return confirm('Are you sure want to delete?')"> <i class="fa fa-trash" aria-hidden="true"></i> </button></a>  
                </td>
              </tr>
              <?php 
                $total = $total + ($values["food_quantity"] * $values["food_price"]);
                $tax = $total*0.1;
                $total2 = $total + $tax;
                }
              ?>
            </table>
            <a href="../database/cartcode.php?action=empty"><button class="btn btn-danger" onclick="return confirm('Are you sure want to empty cart?')"> Empty Cart</button></a>
            <a href="foodpage.php"><button class="btn btn-primary">Continue Shopping</button></a>  
          </div>
          </div>
          <div class="col-md-4" style="background-color:#F0F0F0; box-shadow: 7px 3px 15px #888888">
              <h5 style="margin-top:3%;">Location</h5>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;<?php echo $Address ?></p>
              <hr> 
              <h4>Order Summary</h4>
              <table class="table table-borderless" style="margin-left:-10px">
                <tbody>
                  <tr>
                    <td>Order Total</td>
                    <td>RM <?php echo $total; ?></td>
                  </tr>
                  <tr>
                    <td>Service Tax (10%)</td>
                    <td>RM <?php echo $total*0.1; ?></td>
                  </tr>
                  <tr>
                    <td>Subtotal</td>
                    <td>RM <?php echo number_format($total2, 2); ?></td>
                  </tr>
                </tbody>
              </table>
              <form action="confirmorder.php" method="POST">
                  <input type="text" class="form-control" name="order_id" value="<?php echo $generateid; ?>"  style="display: none;"/>
                  <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['userEmail']; ?>"  style="display: none;"/>
                  <button  type="submit"  name="insert" class="btn btn-success" style="width:100%;margin-bottom:3%;">Checkout </button>
              </form>
          </div>
          </div>
        </div>
    </div>
    <?php
    }
    if(empty($_SESSION["cart"]))
    {
  ?>
  <div class="container">
      <div class="jumbotron" style="margin-top:5%;">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="foodpage.php">order now.</a></p>
      </div>
    </div>
    <?php
      }
    ?>
    </body>
</html>

