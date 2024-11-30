<?php

include("functions.php");

// PHP goes here!

?>
<!-- Header section  -->
<?php include("header.php") ?>

<!-- Main section  -->

<div class="page-content d-flex align-items-center">

    <div class="container d-flex justify-content-center">

        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">

            <div class="col-md-12" id="main_registration">
                <div class="col-md-12">
                    <h3 id="heading">Stay connected with world's largest democracy!</h3>
                </div>

                <form role="form" method="POST" action="handlers/signup.php">
                    <div class="col-md-6 form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            placeholder="First Name" required />
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Surname"
                            required />
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address"
                            required />
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                            required />
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email ID"
                            required />
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required />
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No."
                            required  />
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="col-md-6 form-group" align="right">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                        <div class="col-md-6 form-group" align="left">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer section  -->
<?php include("footer.php") ?>