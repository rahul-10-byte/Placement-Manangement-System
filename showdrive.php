<?php
   session_start();
   
   if(!isset($_SESSION['email'])){
   	header('location:index.php');
   }
   
   $con = mysqli_connect('localhost','root');
  
   	mysqli_select_db($con,'admin');
   
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Current Drives - Admin's Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'includes/nav.php' ?>
        <div id="layoutSidenav">
        <?php include 'includes/sidenav.php' ?>
           
            <div id="layoutSidenav_content">
                
            <h1 style="margin-left: 20px; margin-top: 30px;">Created Campus Drive</h1>


            <div class=" p-5">
                   <?php 
                    require 'includes/conn.php';

                    $sql = "SELECT * FROM drives ORDER BY JobID DESC LIMIT 6";

                    if (mysqli_query($conn, $sql)) {

                        echo "";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    $count = 1;
                    $result = mysqli_query($conn, $sql);

                    ?>
                    

            <?php

            if (mysqli_num_rows($result) > 0) {  ?>
            <div class="col-lg-3 col-sm-6 portfolio-item">


            <?php

                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/<?php echo $row['CompanyName'];?>.jpeg" alt="" ></a>
                    <div class="card-block  p-3">
                        <h4 class="card-title"><a href="#"><?php echo $row['CompanyName'];?></a></h4>
                            <p class="card-text"><b>Role :</b> <?php echo $row['JobDesc'];?></p>
                            <p class="card-text"><b>Package :</b> <?php echo $row['SalPackage'];?></p>
                    </div>
                </div>
                <?php
                    $count++;
                    }
                    } else {
                        echo '0 results';
                    }

                ?>
            </div>
        </div>
        <!-- /.row -->



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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
