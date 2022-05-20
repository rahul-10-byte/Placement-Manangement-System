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
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">

    <?php


if(isset($_SESSION['name'])&&isset($_SESSION['email'])){
    header("Location: home.php");
}

$set_value = 0;
$error = '0';
if(isset($_REQUEST['email'])&&isset($_REQUEST['pass'])){
    $email = trim($_REQUEST['email']);
    $pass = trim($_REQUEST['pass']);
    if($email=="admin@gmail.com"&&$pass=="admin"){
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    }
    $pass = md5(trim($_REQUEST['pass']));
    $sql = "SELECT *
               FROM users
               WHERE user_email='$email'
               AND user_pass='$pass'";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows>0){
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['email'] = $row['user_email'];
        header("Location: home.php");
    } else{
        $set_value = 1;
        $error = "Invalid Email or Password";
    }
}
?>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="email" name="email" value="" id="input-email" placeholder="Enter Your Email ID" required>
                                                <label for="inputEmail"><i class="fa-solid fa-envelope"></i> Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" name="pass" value="" id="input-pass" placeholder="Enter Your Password" required>
                                                <label for="inputPassword"><i class="fa fa-key fa-fw"></i> Password</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-success d-block m-auto" type="submit"> Submit </button>
                                            </div>
                                        </form>
                                       
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
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
                            <div class="text-muted">Copyright &copy; Rahul Kalyankar 2022</div>
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
