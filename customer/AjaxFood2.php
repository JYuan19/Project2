<?php
$connect = new PDO("mysql:host=localhost; dbname=foodtiger", "root", "");
  $limit = '9';
  $page = 1;
  if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
  } else {
    $start = 0;
  }

  $query = "SELECT * FROM food ";

  if ($_POST['query'] != '') {
    $query .= 'WHERE nameFood LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"';
  }

  $query .= 'ORDER BY f_id ASC ';

  $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
  $statement = $connect->prepare($query);
  $statement->execute();
  $total_data = $statement->rowCount();
  $statement = $connect->prepare($filter_query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_filter_data = $statement->rowCount();

  $output = '
  <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
  <div class="row">
  ';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $output .= '
      
      <div class="col-md-4 col-sm-6" >
          <div class="product-grid9" style="text-align:center;">
              <div class="product-image9">
                  <a href="#" data-toggle="modal" data-target="#login_form"><img src="image/' . $row["imageFood"] . '" class="img-fluid" style="width:400px; height:300px;object-fit: contain;"></a>
              </div>
              <div class="product-content" style="text-align:left;">
                  <h3 class="title"><a href="#" data-toggle="modal" data-target="#login_form">' . $row['nameFood'] . '</a></h3>
                  <div class="price">RM ' . $row['price'] . '</div>
                  <a class="add-to-cart" href="#" data-toggle="modal" data-target="#login_form">VIEW PRODUCT</a>
              </div>
          </div>
      </div> 
      ';
    }
  } else {
    $output .= '
    <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
      <div class="row">
        <div class="container"  style="width:100%; height:500px;" >
          <h1 style="text-align: center;">No Result....</h1>
        </div>
      </div>
    </div>
    ';
  }

  $output .= '
  </div>
  </div>
    <ul class="pagination " style="margin-bottom: 2%;margin-left: 69%;">
  ';

  $total_links = ceil($total_data / $limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';

  if ($total_links > 4) {
    if ($page < 5) {
      for ($count = 1; $count <= 5; $count++) {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    } else {
      $end_limit = $total_links - 5;
      if ($page > $end_limit) {
        $page_array[] = 1;
        $page_array[] = '...';
        for ($count = $end_limit; $count <= $total_links; $count++) {
          $page_array[] = $count;
        }
      } else {
        $page_array[] = 1;
        $page_array[] = '...';
        for ($count = $page - 1; $count <= $page + 1; $count++) {
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
      }
    }
  } else {
    for ($count = 1; $count <= $total_links; $count++) {
      $page_array[] = $count;
    }
  }
  if (!$total_data == 0) {
    for ($count = 0; $count < count($page_array); $count++) {
      if ($page == $page_array[$count]) {
        $page_link .= '
      <li class="page-item active">
        <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
      </li>
      ';

        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
          $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
        } else {
          $previous_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Previous</a>
        </li>
        ';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id > $total_links) {
          $next_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Next</a>
        </li>
          ';
        } else {
          $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
      } else {
        if ($page_array[$count] == '...') {
          $page_link .= '
        <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
        </li>
        ';
        } else {
          $page_link .= '
        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
        ';
        }
      }
    }
  }
  $output .= $previous_link . $page_link . $next_link;
  $output .= '
  </div>
    </ul>
  ';

  echo $output;
?>

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
                              url: "../database/registercode.php",
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

        $.post("../database/logincode.php", {
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