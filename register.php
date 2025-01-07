<?php 

   //Simpan dengan nama file panel.php
     require "koneksidb.php";
     $data    = query("SELECT * FROM tb_monitoring")[0];
     $rfid = 0;

     if (isset($_GET['getRFID'])) {
        $rfid = 1;
      }

 ?>
 
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>RFID PHP</title>
</head>

<body>

    <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:index.php?pesan=belum_login");
        }

        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "berhasil"){
                 echo "<script type='text/javascript'>alert('Berhasil menambahkan data!');</script>";
             }
			 if($_GET['pesan'] == "gagal"){
                 echo "<script type='text/javascript'>alert('Data ada yang menggunakan.');</script>";
             }
         }
	?>

    <div class="dashboard-main-wrapper">
      
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">RFID PHP</a>

            </nav>
        </div>
      
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
								<ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="data-tables.php">Log Data</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="inputdata.php">Tambah Data</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" href="tambah-saldo.php">Top Up</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" href="log-topup.php">Log Top Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="tambah-tol.php">Tambah Tol</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" href="log-tol.php">Data Tol</a>
                                    </li>
                                </ul>
                            </li> 
                            <li class="nav-divider">
                                Setting
								<ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="register.php">Tambah User</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>    
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
       
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                   
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Input Data User Baru </h2>
                                
                                <div class="page-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="ecommerce-widget">
                        
                        <div class="card">
                            <div class="card-body">
                                <form action="action-input-register.php" method="POST" name="form-input-data">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukan username">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukan password">
                                    </div>
                                    <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
                                    <a onclick="cancelSubmit()" class="btn btn-link">Cancel</a>

                                </form> 
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
       
    </div>
  
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
	<script src="assets/libs/js/script.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>

    <script>
        function cancelSubmit(){
            location.reload();
        }
    </script>

</body>
 
</html>