<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
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
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require 'includes/nav.php'; ?>
        <div id="layoutSidenav">
            <?php include 'includes/sidenav.php'?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                

                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                   <?php

                                    require 'includes/conn.php';

                                    $id = $_GET['id'];

                                    if ($id == 'CS') {
                                        $param = "'%A0202%'";
                                    } elseif ($id == 'IT') {
                                        $param = "'%B0202%'";
                                    } elseif ($id == 'BCA') {
                                        $param = "'%C0202%'";
                                    } elseif ($id == 'ANI') {
                                        $param = "'%D0202%'";
                                    }
                                    

                                    $sql = 'SELECT id, Name, Username FROM mgm_students WHERE Username LIKE '.$param;

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
                                                <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
            
                                                    <td>
                                                        <?php echo $row['Name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Username']; ?>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
