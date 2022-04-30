<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "admin");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">

<?php

if(isset($_SESSION['name'])&&isset($_SESSION['email']))
    header("Location: home.php");

$set_value = 0;
$error = '0';
    if(isset($_REQUEST['name'])&&isset($_REQUEST['email'])&&isset($_REQUEST['pass'])){

        $name = trim($_REQUEST['name']);
        $email = trim($_REQUEST['email']);
        $prn = trim($_REQUEST['prn']);
        $mobile = trim($_REQUEST['mobile']);
        $pass = md5(trim($_REQUEST['pass']));

        $result = "INSERT INTO users (user_name,prn,mobile,user_email,user_pass) values('$name', '$prn', '$mobile', '$email','$pass')";

        if(mysqli_query($con, $result)){
            $sql = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";

            $result = mysqli_query($con, $sql);

            $row = mysqli_fetch_array($result);

            $id = $row['user_id'];

            $sql = "INSERT INTO profile (uid) values($id)";

            $result = mysqli_query($con, $sql);

            header("Location: login.php");

        } else{

            $set_value = 1;
            $error = "Database Error Could not able to execute". $result." ".mysqli_error($con);
        }
    }
?>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="signup.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="name" placeholder="Enter your first name" required />
                                                        <label for="inputName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="PRN" type="text" name="prn" placeholder="PRN" required/>
                                                        <label for="inputPrn">PRN number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="email" type="email" name="email" placeholder="email" required/>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="mobile" type="text" placeholder="Enter mobile" name="mobile"/>
                                                        <label for="inputMobile">Mobile</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" type="password" onkeyup="var passstr = $('#confirm   Password').val(); if (this.value != passstr){$('#error_password_message').text('Password must be match'); $('#error_password_message').css('display','block');} else {$('#error_password_message').css('display','none');}" placeholder="password" name="pass"/>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                    <input class="form-control" type="password" id="confirmPassword" onkeyup="var passstr = $('#inputPassword').val(); if (this.value != passstr){$('#error_password_message').text('Password must be match'); $('#error_password_message').css('display','block');} else {$('#error_password_message').css('display','none');}" placeholder="Confirm Password" required>
                                                        <label for="inputPassword">Confirm Passoword</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-success d-block m-auto" type="submit"> Create Account </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

