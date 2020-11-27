<?php
include "../database/connection.php";
session_start();
if (isset($_GET['f_id'])) {
    $f_id = $_GET['f_id'];
    $sql = "select * from food where food.f_id='" .$f_id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nameFood = $row['nameFood'];
            $description = $row['description'];
            $imagefood = $row['imageFood'];
            $cart_id = $row['cart_id'];
            $price = $row['price'];
            $f_id = $row["f_id"];
        }
    }
}

if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}

$_SESSION["food_id"] = $f_id;

?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Food</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/fooddetails.css">
    <link rel="stylesheet" href="../css/yel.css">
    <link rel="stylesheet" href="../css/profile.css">
    
</head>

<body>
    <header>
        <?php
            include "navandfooter/nav.php";

            if(isset($_SESSION['userEmail-foodtiger']))
            {
                require "chat.php";
            } 
        ?>
    </header>
    <div class="container" style="margin-top:8%;margin-bottom:3%;">
        <?php
            $sql = 'SELECT c_id,name FROM category';
            $sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY f_id";
            $connect = mysqli_connect("localhost", "root", "", "foodtiger");

            $query = "SELECT * FROM food ORDER BY f_id ASC";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_all($result)) {
            ?>
                <form method="post" action="cart.php?action=add&id=<?php echo $f_id; ?>">
                    <div class="container">
                        <div class="row">
                            <aside class="col-sm-6">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <img src="image/<?php echo $imagefood; ?>" alt="<?php echo $nameFood; ?>" class="img-fluid" style="width:100%;height:70%;margin-top:100px;text-align:center;">
                                    </div> <!-- slider-product.// -->
                                </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-6">
                                <article class="card-body p-5">
                                    <h3 class="title mb-3"><?php echo $nameFood; ?></h3>

                                    <p class="price-detail-wrap">
                                        <span class="price h3 text-warning">
                                            <span class="currency">RM<?php echo $price; ?></span>
                                        </span>
                                    </p> <!-- price-detail-wrap .// -->
                                    <dl class="item-property">
                                        <dt>Description</dt>
                                        <dd>
                                            <p><?php echo  $description; ?></p>
                                        </dd>
                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="param param-inline">
                                                <dt>Quantity: </dt><br>
                                                <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" data-decimals="0" />
                                            </dl>
                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <hr>
                                    <input name="hidden_image" value="<?php echo $imagefood; ?>" style="display: none;">
                                    <input name="hidden_name" value="<?php echo $nameFood; ?>" style="display: none;">
                                    <input name="hidden_price" value="<?php echo  $price; ?>" style="display: none;">
                                    <input name="hidden_description" value="<?php echo  $description; ?>" style="display: none;">
                                    <button type="submit" name="add" class="btn btn-warning text-white" style="width:50%;font-family: Gill Sans, sans-serif;font-weight:bold;"><i class="fas fa-shopping-cart"></i> &nbsp;Add to Cart</button>             
                                </article> <!-- card-body.// -->
                            </aside> <!-- col.// -->
                        </div> <!-- row.// -->
                    </div> <!-- card.// -->
                    
            </form>
            <div class="container-fluid" style="margin-top:3%;">
            <div class="container">
                <h3>Review</h3><hr>
                <p>Write some review now!!</p>
                <form method="POST" id="comment_form">
                    <div class="form-group">
                        <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" value="<?php echo $_SESSION["Name"];?>" readonly/>
                    </div>
                    <div class="form-group">
                        <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="comment_id" id="comment_id" value="0" />
                        <input type="text" name="food_id" id="food_id" value="<?php echo $f_id; ?>" style="display:none;" >
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit" style="width:10%;height:3%"/>
                    
                    </div>
                </form>
                <span id="comment_message"></span>
                <br />
                <div id="display_comment"></div>
            </div>
            <?php
                    }
                }
                    ?>
            </div>
        </div>
    </div>
    <footer style="margin-top:5%;">
        <?php
            include "navandfooter/footer.php";
        ?>
    </footer>
</body>

</html>
<link rel="stylesheet" href="../dist/jquery.nice-number.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="../dist/jquery.nice-number.js"></script>
<script>
    $('input[type="number"]').niceNumber({
    });


    $(document).ready(function(){
        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
            url:"add_review.php",
            method:"POST",
            data:form_data,
            dataType:"JSON",
            success:function(data)
            {
                if(data.error != '')
                {
                $('#comment_form')[0].reset();
                $('#comment_message').html(data.error);
                $('#comment_id').val('0');
                load_comment();
                }
            }
            })
        });

        load_comment();

        function load_comment()
        {
            $.ajax({
            url:"show_review.php",
            method:"POST",
            success:function(data)
            {
                $('#display_comment').html(data);
            }
            })
        }
        
    });
</script>