<?php
include "database/connection.php";
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/nav-bar.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/aboutus.css">
</head>

<body>
  <header>
    <?php
    require "navandfooter/nav.php";

    if (isset($_SESSION['userEmail-foodtiger'])) {
      require "chat.php";
    }
    ?>

  </header>
  <div class="in1 ">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/food.jpg" alt="food" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>FoodTiger</h1>
            <p class="p2">Hungry always Hungry</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/food4.jpg" alt="food2" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>Quality Food</h1>
            <p class="p2">We deliver Quality Food and deliver On Time!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/food3.jpg" alt="food3" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>Best Customer Service</h1>
            <p class="p2">We deliver Best Customer Service and Support!</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>

    <div class="container" style="margin-top:3%;">
      <h2>Our Foods</h2>
      <div class="card-deck" style="margin-top:5%;">
        <?php
        if (isset($_SESSION['userEmail-foodtiger'])) {
          $query = "SELECT * FROM food limit 3";
          $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
          if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
              $f_id = $row['f_id'];
              $nameFood = $row['nameFood'];
              $description = $row['description'];
              $imageFood = $row['imageFood'];
        ?>
              <div class="card">
                <div class="inner">
                  <a href="customer/fooddetails.php?f_id=<?php echo $row['f_id']; ?>"><img class="card-img-top" src="image/image/<?php echo $row['imageFood']; ?>" alt="<?php echo $row['nameFood']; ?>"></a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['nameFood']; ?></h5>
                  <p class="card-text"><?php echo $row['description']; ?></p>
                </div>
              </div>
            <?php
            }
          }
        } else {
          $query = "SELECT * FROM food limit 3";
          $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
          if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
              $f_id = $row['f_id'];
              $nameFood = $row['nameFood'];
              $description = $row['description'];
              $imageFood = $row['imageFood'];
            ?>
              <div class="card">
                <div class="inner">
                  <a href="#" data-toggle="modal" data-target="#login_form"><img class="card-img-top" src="image/image/<?php echo $row['imageFood']; ?>" alt="<?php echo $row['nameFood']; ?>"></a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['nameFood']; ?></h5>
                  <p class="card-text"><?php echo $row['description']; ?></p>
                </div>
              </div>
        <?php
            }
          }
        }
        ?>
      </div>
      <a href="customer/foodpage.php"><button class="btn btn-warning text-white" style="margin-top:3%;">Read More</button> </a>
    </div>


    <!-- Carousel 2 -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" style="margin-top:2%;">
        <div class="carousel-item active">
          <img src="image/food2.jpg" alt="food4" width="100%" height="100%">
        </div>
        <div class="carousel-item">
          <img src="image/food5.jpg" alt="food5" width="100%" height="100%">
        </div>
        <div class="carousel-item">
          <img src="image/food6.jpg" alt="food6" width="100%" height="100%">
        </div>
      </div>
    </div>

    <div class="container" style="margin-top:3%;">
      <h2>Categories</h2>
      <div class="card-deck" style="margin-top:5%;">
        <?php
        $query = "SELECT * FROM category limit 3";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run_query) > 0) {
          while ($row = mysqli_fetch_array($run_query)) {
            $c_id = $row['c_id'];
            $name = $row['name'];
            $image = $row['image'];
        ?>
            <div class="card">
              <div class="inner">
                <a href="customer/food.php?category=<?php echo $row['c_id']; ?>"><img class="card-img-top" src="image/image/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"></a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <a href="customer/category.php"><button class="btn btn-warning text-white" style="margin-top:3%;margin-bottom:5%;">Look More</button> </a>

    </div>
    <!-- Carousel 3 -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" style="margin-top:2%;">
        <div class="carousel-item active">
          <img src="image/food7.jpg" alt="food8" width="100%" height="100%">
        </div>
        <div class="carousel-item">
          <img src="image/food8.jpg" alt="food8" width="100%" height="100%">
        </div>
        <div class="carousel-item">
          <img src="image/food9.jpg" alt="food9" width="100%" height="100%">
        </div>
      </div>
    </div>

    <div class="container" style="margin-top:3%;">
      <h2>Blogs</h2>
      <div class="card-deck" style="margin-top:5%;">
        <?php
        $query = "SELECT * FROM blog limit 3";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run_query) > 0) {
          while ($row = mysqli_fetch_array($run_query)) {
            $id = $row['id'];
            $title = $row['title'];
            $image = $row['image'];
        ?>
            <div class="card">
              <div class="inner">
                <a href="customer/blogDetail.php?id=<?php echo $row['id']; ?>"><img class="card-img-top" src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>"></a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <a href="customer/blog.php"><button class="btn btn-warning text-white" style="margin-top:3%;">Read More</button> </a>
    </div>

    <!-- About Us -->
    <div class="container" style="margin-top:5%;">
      <h2>About Us</h2>
    </div>
    <div class="container" style="text-align: left;">
      <div class="row">
        <div class="column-66">
          <h1 class="large-font" style="color:#FFBD00;"><b>We are FoodTiger.</b></h1>
          <p style="font-size:1.3em;">FoodTiger is a convenient online food ordering website. Customers can browse through the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
          <a class="abutton" href="aboutus.php"><button class="button3">Read More</button></a>
        </div>
        <div class="column-33">
          <img src="image/logo 256x256.png" width="335" height="471">
        </div>
      </div>
    </div>


    <!-- How It Works -->
    <div class="container" style="margin-top:3%;margin-bottom: 3%;">
      <h2>Frequently Asked Questions(FAQ)</h2>
      <button class="collapsible">What are your opening hours?</button>
      <div class="content">
        <p class="p3">FoodTiger is open from 10am to 11pm from Monday to Sunday.</p>
      </div>
      <button class="collapsible">How can I pay for my order?</button>
      <div class="content">
        <p class="p3">We provide Credit/Debit Card and Cash on Delivery. Once the payment is comfirmed, the order will be transmitted to the system. </p>
      </div>
      <button class="collapsible">How can I create an account at FoodTiger?</button>
      <div class="content">
        <p class="p3">Click on "Sign Up" at the top of the page. Then fill out all information in the "Sign Up" section and click the "Submit" button.</p>
      </div>
    </div>
  </div>
  <footer>
    <?php
    require "navandfooter/footer.php";
    ?>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }
  </script>
</body>

</html>

<div class="modal fade" id="login_form" role="dialog" method="post">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content animate">
      <div class="imgcontainer">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="container1">
        <h1>Login</h1>

        <hr>
        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="Email" id="Email">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password" id="Password">


        <button type="submit" name="login_button" class="button2" id="login_button" class="btn btn-warning">Login</button>
        <span id="notFound" style="color:red;display:none">Account Not Found</span>
        <span id="wrong" style="color:red;display:none">Password is wrong</span>
        <span id="please" style="color:red;display:none">Fields are required</span>

      </div>

      <div class="container1" style="background-color:#f1f1f1">
        <span class="psw">No Account??<a href="#" data-toggle="modal" data-target="#signUp">Register</a></span>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="signUp" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="modal-content animate" id="register_form" name="form1" method="post">
      <div class="imgcontainer">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="container1">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>


        <label for="Username">Username:</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" minlength="4" maxlength="8">
        <span id="nameLen" style="color:red;display:none">The Username field needs to be at least 2 characters</span>
        <span id="namefield" style="color:red;display:none">Fields are required</span>

        <label for="Email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        <span id="exists" style="color:red;display:none">Account Exixts</span>
        <span id="emailformat" style="color:red;display:none">Valid Email Format</span>
        <span id="emailfield" style="color:red;display:none">Fields are required</span>

        <label for="Phone">Phone:</label>
        <input type="text" class="form-control" id="phoneNO" placeholder="Phone" name="phoneNO">
        <span id="phonLen" style="color:red;display:none">The Phone Number field needs to be at least 10
          characters</span>
        <span id="phonefield" style="color:red;display:none">Fields are required</span>

        <label for="Address">Address:</label>
        <input type="text" class="form-control" id="address" placeholder="address" name="address">
        <span id="adressfield" style="color:red;display:none">Fields are required</span>

        <label for="Password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <span id="match" style="color:red;display:none">Password is not match</span>
        <span id="passwordLen" style="color:red;display:none">The Password field needs to be at least 6
          characters</span>
        <span id="pass1field" style="color:red;display:none">Fields are required</span>


        <label for="Repeat Password">Repeat Password:</label>
        <input type="password" class="form-control" id="password2" placeholder="Password" name="password2">
        <span id="pass2field" style="color:red;display:none">Fields are required</span>



        <p>By creating an account you agree to our <a href="term.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" data-dismiss="modal" class="cancelbtn2 ">Cancel</button>
          <input type="button" name="save" class="signupbtn" value="Register" id="register_button">
        </div>

      </div>
  </div>
  </form>
</div>
</div>


<script>
  $(document).ready(function() {
    $('#register_button').on('click', function() {

      var name = $('#name').val();
      var email = $('#email').val();
      var phoneNO = $('#phoneNO').val();
      var address = $('#address').val();
      var password = $('#password').val();
      var password2 = $('#password2').val();
      var min = 2;
      var max = 50;
      var mail = /^([a-zA-Z0-9-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var passmin = 5;
      var passmax = 30;
      var phmin = 9;
      var phmax = 13;
      let namefield = document.querySelector('#namefield');
      let emailfield = document.querySelector('#emailfield');
      let phonefield = document.querySelector('#phonefield');
      let adressfield = document.querySelector('#adressfield');
      let pass1field = document.querySelector('#pass1field');
      let pass2field = document.querySelector('#pass2field');
      let match = document.querySelector('#match');
      let exists = document.querySelector('#exists');
      let nameLen = document.querySelector('#nameLen');
      let emailformat = document.querySelector('#emailformat');
      let passwordLen = document.querySelector('#passwordLen');
      let phonLen = document.querySelector('#phonLen');
      if (name != "") {
        if (email != "") {
          if (phoneNO != "") {
            if (address != "") {
              if (password != "") {
                if (password2 != "") {
                  if (password == password2) {
                    if (name.length > min && name.length < max) {
                      if (mail.test(email)) {
                        if (phoneNO.length > phmin && password.length < phmax) {
                          if (password.length > passmin && password.length < passmax) {

                            $.ajax({
                              url: "database/registercode.php",
                              type: "POST",
                              data: {
                                type: 1,
                                name: name,
                                email: email,
                                phoneNO: phoneNO,
                                address: address,
                                password: password
                              },
                              cache: false,
                              success: function(dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                  alert('Registration Successful');
                                  window.location = "foodpage.php";
                                } else if (dataResult.statusCode == 201) {
                                  exists.style.display = "block";
                                  passwordLen.style.display = "none";
                                  phonLen.style.display = "none";
                                  emailformat.style.display = "none";
                                  nameLen.style.display = "none";
                                  match.style.display = "none";
                                  namefield.style.display = "none";
                                  emailfield.style.display = "none";
                                  phonefield.style.display = "none";
                                  adressfield.style.display = "none";
                                  pass1field.style.display = "none";
                                  pass2field.style.display = "none";
                                  event.preventDefault();
                                }

                              }
                            });
                          } else {
                            exists.style.display = "none";
                            passwordLen.style.display = "block";
                            phonLen.style.display = "none";
                            emailformat.style.display = "none";
                            nameLen.style.display = "none";
                            match.style.display = "none";
                            namefield.style.display = "none";
                            emailfield.style.display = "none";
                            phonefield.style.display = "none";
                            adressfield.style.display = "none";
                            pass1field.style.display = "none";
                            pass2field.style.display = "none";
                            event.preventDefault();
                          }
                        } else {
                          exists.style.display = "none";
                          passwordLen.style.display = "none";
                          phonLen.style.display = "block";
                          emailformat.style.display = "none";
                          nameLen.style.display = "none";
                          match.style.display = "none";
                          namefield.style.display = "none";
                          emailfield.style.display = "none";
                          phonefield.style.display = "none";
                          adressfield.style.display = "none";
                          pass1field.style.display = "none";
                          pass2field.style.display = "none";
                          event.preventDefault();
                        }
                      } else {
                        exists.style.display = "none";
                        passwordLen.style.display = "none";
                        phonLen.style.display = "none";
                        emailformat.style.display = "block";
                        nameLen.style.display = "none";
                        match.style.display = "none";
                        namefield.style.display = "none";
                        emailfield.style.display = "none";
                        phonefield.style.display = "none";
                        adressfield.style.display = "none";
                        pass1field.style.display = "none";
                        pass2field.style.display = "none";
                        event.preventDefault();
                      }
                    } else {
                      exists.style.display = "none";
                      passwordLen.style.display = "none";
                      phonLen.style.display = "none";
                      emailformat.style.display = "none";
                      nameLen.style.display = "block";
                      match.style.display = "none";
                      namefield.style.display = "none";
                      emailfield.style.display = "none";
                      phonefield.style.display = "none";
                      adressfield.style.display = "none";
                      pass1field.style.display = "none";
                      pass2field.style.display = "none";
                      event.preventDefault();
                    }
                  } else {
                    exists.style.display = "none";
                    passwordLen.style.display = "none";
                    phonLen.style.display = "none";
                    emailformat.style.display = "none";
                    nameLen.style.display = "none";
                    match.style.display = "block";
                    namefield.style.display = "none";
                    emailfield.style.display = "none";
                    phonefield.style.display = "none";
                    adressfield.style.display = "none";
                    pass1field.style.display = "none";
                    pass2field.style.display = "none";
                    event.preventDefault();
                  }

                } else {
                  exists.style.display = "none";
                  passwordLen.style.display = "none";
                  phonLen.style.display = "none";
                  emailformat.style.display = "none";
                  nameLen.style.display = "none";
                  match.style.display = "none";
                  namefield.style.display = "none";
                  emailfield.style.display = "none";
                  phonefield.style.display = "none";
                  adressfield.style.display = "none";
                  pass1field.style.display = "none";
                  pass2field.style.display = "block";
                  event.preventDefault();
                }
              } else {
                exists.style.display = "none";
                passwordLen.style.display = "none";
                phonLen.style.display = "none";
                emailformat.style.display = "none";
                nameLen.style.display = "none";
                match.style.display = "none";
                namefield.style.display = "none";
                emailfield.style.display = "none";
                phonefield.style.display = "none";
                adressfield.style.display = "none";
                pass1field.style.display = "block";
                pass2field.style.display = "none";
                event.preventDefault();
              }
            } else {
              exists.style.display = "none";
              passwordLen.style.display = "none";
              phonLen.style.display = "none";
              emailformat.style.display = "none";
              nameLen.style.display = "none";
              match.style.display = "none";
              namefield.style.display = "none";
              emailfield.style.display = "none";
              phonefield.style.display = "none";
              adressfield.style.display = "block";
              pass1field.style.display = "none";
              pass2field.style.display = "none";
              event.preventDefault();
            }
          } else {
            exists.style.display = "none";
            passwordLen.style.display = "none";
            phonLen.style.display = "none";
            emailformat.style.display = "none";
            nameLen.style.display = "none";
            match.style.display = "none";
            namefield.style.display = "none";
            emailfield.style.display = "none";
            phonefield.style.display = "block";
            adressfield.style.display = "none";
            pass1field.style.display = "none";
            pass2field.style.display = "none";
            event.preventDefault();
          }
        } else {
          exists.style.display = "none";
          passwordLen.style.display = "none";
          phonLen.style.display = "none";
          emailformat.style.display = "none";
          nameLen.style.display = "none";
          match.style.display = "none";
          namefield.style.display = "none";
          emailfield.style.display = "block";
          phonefield.style.display = "none";
          adressfield.style.display = "none";
          pass1field.style.display = "none";
          pass2field.style.display = "none";
          event.preventDefault();
        }
      } else {
        exists.style.display = "none";
        passwordLen.style.display = "none";
        phonLen.style.display = "none";
        emailformat.style.display = "none";
        nameLen.style.display = "none";
        match.style.display = "none";
        namefield.style.display = "block";
        emailfield.style.display = "none";
        phonefield.style.display = "none";
        adressfield.style.display = "none";
        pass1field.style.display = "none";
        pass2field.style.display = "none";
        event.preventDefault();
      }
    });


    $('#login_button').click(function() {

      var login = $('#login_button').val();
      var Email = $('#Email').val();
      var Password = $('#Password').val();
      if (Email == '' || Password == '') {
        please.style.display = "block";
        event.preventDefault();
      } else {
        let please = document.querySelector('#please');
        let notFound = document.querySelector('#notFound');
        let wrong = document.querySelector('#wrong');

        $.post("database/logincode.php", {
          login: login,
          Email: Email,
          Password: Password
        }).done(function(data) {

          //alert(data);  
          if (data == 'wrong') {
            please.style.display = "none";
            wrong.style.display = "block";
            notFound.style.display = "none";
            event.preventDefault();
          } else if (data == 'notFound') {
            please.style.display = "none";
            wrong.style.display = "none";
            notFound.style.display = "block";
            event.preventDefault();
          } else {
            window.history.go(0);
          }
        });
      };
    });

  });
</script>
