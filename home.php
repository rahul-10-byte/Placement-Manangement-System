<?php
   session_start();
   
   if(!isset($_SESSION['email'])){
   	header('location:login.php');
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
        <title>Admin - Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require 'includes/nav.php' ?>

        <div id="layoutSidenav">
        <?php include 'includes/sidenav.php'?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-center text-white mb-4">
                                    <div class="card-body">
                                    <?php

                                        require 'includes/conn.php';

                                        $param = "'%A0202%'";

                                        $sql = 'SELECT COUNT(*) as total FROM mgm_students WHERE Username LIKE '.$param;
    
                                        $result=mysqli_query($conn, $sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo "CS Students: ".$data['total'];

                                    ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="1" href="./tables.php?id=CS">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-center text-white mb-4">
                                    <div class="card-body">
                                    <?php

                                    // require 'includes/conn.php';

                                    $param = "'%B0202%'";

                                    $sql = 'SELECT COUNT(*) as total FROM mgm_students WHERE Username LIKE '.$param;

                                    $result=mysqli_query($conn, $sql);
                                    $data=mysqli_fetch_assoc($result);
                                    echo "IT Students: ".$data['total'];

                                    ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" id="2" href="./tables.php?id=IT">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-center text-white mb-4">
                                    <div class="card-body">
                                        <?php 
                                        $param = "'%C0202%'";

                                        $sql = 'SELECT COUNT(*) as total FROM mgm_students WHERE Username LIKE '.$param;
    
                                        $result=mysqli_query($conn, $sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo "BCA Students: ".$data['total'];
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-BCAems-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./tables.php?id=BCA">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-center text-white mb-4">
                                    <div class="card-body">
                                        <?php 
                                        $param = "'%D0202%'";

                                        $sql = 'SELECT COUNT(*) as total FROM mgm_students WHERE Username LIKE '.$param;
    
                                        $result=mysqli_query($conn, $sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo "Animation Students: ".$data['total'];
                                        ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"  href="./tables.php?id=ANI">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Placed Student (Year-wise)
                                        <?php
                                            // include 'includes/conn.php';
                                            $query = mysqli_query($conn, "SELECT YEAR(Start_date) as Year, COUNT(*) as placedStudent FROM students GROUP BY YEAR(Start_date)");

                                            foreach ($query as $data) {
                                                $year[] = $data['Year']; 
                                                $placedStudent[] = $data['placedStudent'];
                                            } 
                                        ?>

                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Pie Chart of Offices (realtime with MySQL)
                                        <?php
                                            // include 'includes/conn.php';
                                            $query = mysqli_query($conn, "SELECT Office, COUNT(*) AS Total FROM `students` GROUP BY Office");

                                            foreach ($query as $data) {
                                                $office[] = $data['Office']; 
                                                $total[] = $data['Total'];
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Student Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start Date</th>
                                        <th>Salary</th>
                                    </tr>

                                </thead>

                                    <?php

                                    // require 'includes/conn.php';

                                    $sql = 'SELECT * from students';

                                    if (mysqli_query($conn, $sql)) {

                                    echo "";
                                    } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }

                                    $count = 1;
                                    $result = mysqli_query($conn, $sql);
                                    
                                    ?>

                                    <tbody>

                                    <?php
                                    
                                    if (mysqli_num_rows($result) > 0) {

                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) { ?>

                                           
                                                <tr>
                                                    <th>
                                                        <?php echo $row['id']; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $row['Name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Position']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Office']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Age']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Start_date']; ?>
                                                    </td>
                                                    <td>
                                                        $<?php echo $row['Salary']; ?>
                                                    </td>
                                                </tr>
                                           

                                        <?php
                                            $count++;
                                        }
                                    } else {
                                    echo '0 results';
                                    }

                                    ?>
 </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
        <script>
           const labels = <?php echo json_encode($year); ?>;
            const data = {
            labels: labels,
            datasets: [{
                label: 'Student Placed',
                // data: [65, 59, 80, 81, 56, 55, 40],
                 data: <?php echo json_encode($placedStudent); ?> ,
                backgroundColor: [
                'rgba(2,117,216,0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 3
            }]
            };

            const config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
            };

            var myChart = new Chart(
            document.getElementById('myBarChart'),
            config
        );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($office); ?>,
                datasets: [{
                data: <?php echo json_encode($total); ?>,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#CC5500'],
                }],
            },
            });

        </script>
    </body>
</html>
