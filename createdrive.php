                
   <?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'admin');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>New Drive - Admin's Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <link href="css/templatemo-style.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>



<body class="sb-nav-fixed" style="font-size: 16px; background: #d0e1e1;">

    <?php require 'includes/nav.php' ?>

    <div id="layoutSidenav">
        <?php include 'includes/sidenav.php' ?>
        <div id="layoutSidenav_content">


            <div class="templatemo-content-container">
                <div class="templatemo-content-widget white-bg">
                    <h1 class="margin-bottom-10">New Campus Drive</h1>
                    <p>Add a New Job for Placement</p>

            <form action="newdrive.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="inputJobId">Job ID: </label>
                            <input type="text" name="JobID" class="form-control" id="inputJobId" placeholder="1234">
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="inputJobDesc">Job Description: </label>
                            <input type="text" name="JobDesc" class="form-control" id="inputJobDesc" placeholder="Job Description">
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="companyName">Company Name: </label>
                            <input type="text" name="Company" class="form-control" id="company" placeholder="xyz">
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="postDate">Post Date: </label>
                            <input type="date" name="PostDate" class="form-control" id="postdate">
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="interviewDate">Interview Date: </label>
                            <input type="date" name="Interdate" class="form-control" id="interviewdate">
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="jobExpiry">Job Expiry Date: </label>
                            <input type="date" name="expDate" class="form-control" id="jobexpiry">
                        </div>

                        <div class="col-lg-6 col-md-6 form-group">
                            <label class="control-label templatemo-block">Stream of Study</label>
                            <select name="strm" class="form-control">
                                <option value="--select--">--Stream--</option>
                                <option value="Comp Science">Computer Science</option>
                                <option value="Science">Science</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Business Administration">Business Administration</option>
                                <option value="Arts">Arts</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <label class="control-label templatemo-block">Qualification</label>
                            <select name="Qual" class="form-control">
                                <option value="--select--">--Qualification--</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Masters">Master</option>
                                <option value="Certificate">Certificate</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="otherReq">Other Requirements: </label>
                            <input type="text" name="oreq" class="form-control" id="otherreq" placeholder="">
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="package">Salary Package: </label>
                            <input type="text" name="salPack" class="form-control" id="package" placeholder="5.0 LPA">
                        </div>
                        <div class="col-lg-6 col-md-6 form-group">
                            <label for="location">Job Location: </label>
                            <input type="text" name="Loc" class="form-control" id="location" placeholder="Pune, Mumbai, Chennai, etc.">
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="templatemo-blue-button">add</button>
                    <button type="reset" class="templatemo-white-button">Reset</button>
                </div>
            </form>
            </div>



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
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <!-- jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
</body>

</html>             
                
                
                
                
                
                
                
                
         