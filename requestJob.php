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
    <link rel="stylesheet" href="css/job.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <div class="in1 ">
        <div class="container" style="margin-top:3%;margin-bottom: 3%;">
            <button class="collapsible">Apply For Delivery Man</button>
            <div class="content">
                <div class="form-group">
                    <div class="container">
                        <h6 style="margin-top:3%;">Fill out the questions to apply:</h6>
                    </div>
                    <label for="firstName" class="col-md-3 control-label" style="margin-top:1%;">First Name:</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                        <span id="fnamefield" style="color:red;display:none">Fields are required</span>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="lastName" class="col-md-3 control-label">Last Name:</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                        <span id="lnamefield" style="color:red;display:none">Fields are required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="PhoneNo" class="col-md-3 control-label">Phone Number:</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="PhoneNo" id="PhoneNo" placeholder="Phone Number">
                        <span id="Phone Number" style="color:red;display:none">Fields are required</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Email" class="col-md-3 control-label">Email:</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                        <span id="emailfield" style="color:red;display:none">Fields are required</span>
                        <span id="emailExixts" style="color:red;display:none">This account has been used</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="years" class="col-md-6 control-label">Are you 18 years or older?</label>
                    <div class="col-md-12">
                        <input type="radio" id="years" name="years" value="Yes">
                        <label for="Yes"> Yes</label><br>
                        <input type="radio" id="years" name="years" value="No">
                        <label for="No"> No</label><br>                                    
                    </div>
                </div>

                <div class="form-group">
                    <label for="language" class="col-md-6 control-label">Which language do you prefer?</label>
                    <div class="col-md-12">
                        <input type="radio" id="language" name="language" value="Malay">
                        <label for="Malay">Bahasa Melayu</label><br>
                        <input type="radio" id="language" name="language" value="English">
                        <label for="English">English</label><br> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="citizen" class="col-md-6 control-label">Are you a Malaysian citizen?</label>
                    <div class="col-md-12">
                        <input type="radio" id="citizen" name="citizen" value="Yes">
                        <label for="Yes">Yes</label><br>
                        <input type="radio" id="citizen" name="citizen" value="No">
                        <label for="No">No</label><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="validDriverLicense" class="col-md-6 control-label">Do you have a valid driver's license?</label>
                    <div class="col-md-12">
                        <input type="radio" id="validDriverLicense" name="validDriverLicense" value="Valid">
                        <label for="Yes">Yes</label><br>
                        <input type="radio" id="validDriverLicense" name="validDriverLicense" value="Invalid">
                        <label for="No">No</label><br>
                    </div>
                </div>

                <div class="form-group">
                    <label for="City" class="col-md-6 control-label">What city did you from?</label>
                    <div class="col-md-12">
                        <select id="City" name="City" style="width:30%;">
                            <option value="">Please Select Your city</option>
                            <option value="Johor Bahru">Johor Bahru</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Klang Valley">Klang Valley</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Penang">Penang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak (Kuching,Sibu,Bintulu)">Sarawak (Kuching,Sibu,Bintulu)</option>
                            <option value="Sarawak (Miri)">Sarawak (Miri)</option>
                            <option value="Seremban">Seremban</option>
                            <option value="Terenganu">Terenganu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="vehicle" class="col-md-6 control-label" >What your vehicle?</label>
                    <div class="col-md-12">
                        <select id="vehicle" name="vehicle" style="width:30%;">
                            <option value="">Please Select Your Vehicle</option>
                            <option value="Car">Car</option>
                            <option value="Motorcycle">Motorcycle</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-top:3%;">
                    <button type="submit" name="insertbut" class="btn btn-warning " id="send" style="width: 100%;text-align: center;">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        };

        $(document).ready(function () {
            $('#send').on('click', function () {

                var firstName = $('#firstName').val();
                var lastName = $('#lastName').val();
                var PhoneNo = $('#PhoneNo').val();
                var Email = $('#Email').val();
                var years = $('#years').val();
                var language = $('#language').val();
                var citizen = $('#citizen').val();
                var validDriverLicense = $('#validDriverLicense').val();
                var vehicle = $('#vehicle').val();
                var City = $('#City').val();
                var mail = /^([a-zA-Z0-9-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let fnamefield = document.querySelector('#fnamefield');
                let lnamefield = document.querySelector('#lnamefield');
                let telephone = document.querySelector('#telephone');
                let emailfield = document.querySelector('#emailfield');
                let emailExixts = document.querySelector('#emailExixts');

                if (firstName != "") {
                    if (lastName != "") {
                        if (PhoneNo != "") {
                            if (Email != "") {
                                $.ajax({
                                    url: "database/requestJobCode.php",
                                    type: "POST",
                                    data: {
                                        type: 1,
                                        firstName: firstName,
                                        lastName: lastName,
                                        PhoneNo: PhoneNo,
                                        Email: Email,
                                        years: years,
                                        language: language,
                                        citizen: citizen,
                                        validDriverLicense: validDriverLicense,
                                        vehicle: vehicle,
                                        City: City
                                    },
                                    cache: false,
                                    success: function (dataResult) {
                                        var dataResult = JSON.parse(dataResult);
                                        if (dataResult.statusCode == 200) {
                                            alert('Send Successful Wait the Announcement');
                                            window.location = "Job.php";
                                        } else if (dataResult.statusCode == 201) {

                                            fnamefield.style.display = "none";
                                            lnamefield.style.display = "none";
                                            telephone.style.display = "none";
                                            emailfield.style.display = "none";
                                            emailExixts.style.display = "block";
                                            event.preventDefault();
                                        }
                                    }
                                });


                            } else {
                                fnamefield.style.display = "none";
                                lnamefield.style.display = "none";
                                telephone.style.display = "none";
                                emailfield.style.display = "block";
                                emailExixts.style.display = "block";
                                event.preventDefault();
                            }
                        } else {
                            fnamefield.style.display = "none";
                            lnamefield.style.display = "none";
                            telephone.style.display = "block";
                            emailfield.style.display = "none";
                            emailExixts.style.display = "block";
                            event.preventDefault();
                        }
                    } else {
                        fnamefield.style.display = "none";
                        lnamefield.style.display = "block";
                        telephone.style.display = "none";
                        emailfield.style.display = "none";
                        emailExixts.style.display = "block";
                        event.preventDefault();
                    }
                } else {

                    fnamefield.style.display = "block";
                    lnamefield.style.display = "none";
                    telephone.style.display = "none";
                    emailfield.style.display = "none";
                    emailExixts.style.display = "none";
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>