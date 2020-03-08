<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="logout_js.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="dashboard.css" rel="stylesheet">

</head>
<?php
include 'dbconnect.php';
$user_id=$_SESSION['user_id'];
$sql="select * from user where id='$user_id'";
$res=$con->query($sql);
if($res->num_rows==1){
	while($row=$res->fetch_assoc()){
		$sender=$row['uname'];
		echo "<script>const sender='".$sender."';</script>";
		$addr=$row['addr'];
		echo "<script>const sender_addr='".$addr."';</script>";
	}
}
?>
<?php
$GLOBALS["bal"]=7000;
$_SESSION['category']='State';
if($_SESSION['category']=='Central'){
	echo ' <body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">


                <ul class="navbar-nav mr-auto">
                    <img src="img/money.png" height="73px" width="80px" style="padding:10px;margin-top:5px;background-color: white" >
                    <li><h1 style="color: black;font-size: 50px; background-color: white;height: 78px;width: 220px;padding-top: 15px">deFraud</h1></li>
                </ul>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto" style="font-size: 17px">
                <li class="nav-item no-arrow">
                        <a class="nav-link" href="#" id="balance" role="button"  aria-haspopup="true" aria-expanded="false" style="font-size:25px;letter-spacing:1px;color:white ;margin-right:25px">
           </a></li>
                    <li class="nav-item no-arrow">
                        <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dashboard</a></li>
                    <li class="nav-item no-arrow" style="font-size: 17px">
                        <a class="nav-link" href="schemes.php" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Schemes</a></li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1" style="font-size: 17px">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
        Notifs
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Fund successfully transferred to States for Pradhan Mantri Bima Yojana Scheme</div>
                                    <div class="small text-gray-500">· 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Funds disbursed for Health For All Scheme successfully</div>
                                    <div class="small text-gray-500">· 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Transfer unsuccessful for Rashtriya Madhyamik Shiksha Abhiyan Scheme</div>
                                    <div class="small text-gray-500">· 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <li class="nav-item no-arrow" style="font-size: 17px">
                        <a class="nav-link" id="messagesDropdown" role="button" onclick="genReport()" aria-haspopup="true" aria-expanded="false">
            Generate Report</a></li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white-600 medium">Nidhi Dedhia</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" style="cursor:pointer">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6>Funds Disbursed (This Month)</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign" aria-hidden="true"></i> 40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6>Funds Disbursed (This Year)</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign" aria-hidden="true"></i> 4,80,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6>Total Funds Disbursed</h6></div>
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign" aria-hidden="true"></i> 12,20,15,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6>Total Schemes Funded</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">168</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Monthly Statistics</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">State Wise Fund Disbursal</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Maharashtra
                    </span>
                                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Bihar
                    </span>
                                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Kerala
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dashboard.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="chart-area-demo.js"></script>
    <script src="chart-pie-demo.js"></script>

</body>
    ';}
elseif ($_SESSION['category']=='State'){
	echo '<body id="page-top">
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">


                <ul class="navbar-nav mr-auto">
                    <img src="img/money.png" height="73px" width="80px" style="padding:10px;margin-top:5px;background-color: white" >
                    <li><h1 style="color: black;font-size: 50px; background-color: white;height: 78px;width: 220px;padding-top: 15px">deFraud</h1></li>
                </ul>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto" style="font-size: 17px">
                    
                    <li class="nav-item no-arrow">
                        <a class="nav-link" href="#" id="balance" role="button"  aria-haspopup="true" aria-expanded="false" style="font-size:25px;letter-spacing:1px;color:white ;margin-right:25px">
            </a></li>
                
                    <li class="nav-item no-arrow">
                        <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:white;color:black">
            Dashboard</a></li>
                    <li class="nav-item no-arrow" style="font-size: 17px">
                        <a class="nav-link" href="schemes.php" id="messagesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Schemes</a></li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1" style="font-size: 17px">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
        Notifs
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Fund successfully transferred to States for Pradhan Mantri Bima Yojana Scheme</div>
                                    <div class="small text-gray-500">· 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Funds disbursed for Health For All Scheme successfully</div>
                                    <div class="small text-gray-500">· 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Transfer unsuccessful for Rashtriya Madhyamik Shiksha Abhiyan Scheme</div>
                                    <div class="small text-gray-500">· 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <li class="nav-item no-arrow" style="font-size: 17px">
                        <a class="nav-link" href="#" id="messagesDropdown" onclick="genReport()" role="button" aria-haspopup="true" aria-expanded="false">
            Generate Report</a></li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white-600 medium">Nidhi Dedhia</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="logout()" style="cursor:pointer">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
             <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h6>Funds Disbursed</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign" aria-hidden="true"></i>3,14,500</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6>Schemes Funded</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i aria-hidden="true"></i> 160</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h6>Requests Funded</h6></div>
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><i  aria-hidden="true"></i>5000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h6>Requests Pending</h6></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1238</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Monthly Statistics</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">District Wise Fund Disbursal</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Thane
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Nagpur
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Aurangabad
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dashboard.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="chart-area-demo-state.js"></script>
    <script src="chart-pie-demo-state.js"></script>

</body>';
}
?>
<script>
    let receiver, contract, newLen, balance;

    function startApp() {
        let abi=[{"constant":false,"inputs":[{"internalType":"address","name":"_receiver","type":"address"},{"internalType":"uint256","name":"_amount","type":"uint256"},{"internalType":"string","name":"_scheme","type":"string"}],"name":"transferFunds","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getLength","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"string","name":"_owner","type":"string"}],"name":"hash","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"transactions","outputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"receiver","type":"address"},{"internalType":"string","name":"scheme","type":"string"},{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"timestamp","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"uname","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"}];
        let fundsAddress = "0x9F2203Be246a2eF67a79a95AB589D4968B4a9B6B";
        let web3 = new Web3('http://localhost:8545');
        contract = new web3.eth.Contract(abi, fundsAddress);
        newLen = 0;
    }
    startApp();
    function timeConverter(unixTimestamp) {
        var options = { day: '2-digit', month: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        var dateObj = new Date(unixTimestamp * 1000);
        return dateObj.toLocaleString('en-IN', options).replace(/,/g, "");
    }
    function getBalance() {
        contract.methods.balanceOf(sender_addr).call().then(function (bal) {
            balance = bal;
        })
    }
    function updateBalance() {
        $('#balance').html(balance);
    }

    window.setInterval(function () {
        getBalance();
        updateBalance();
        // getTransactions();
        // track();
    }, 100);

    function wait(time) {
        for (let i = 0; i < time; i++);
    }

    function genReport() {
        var report = new Array();
        var tableHeaders = ["Date", "Sender", "Receiver", "Scheme", "Amount"];
        let csvContent = "data:text/csv;charset=utf-8,";
        let row = tableHeaders.join(",");
        csvContent += row + "\r\n";
        contract.methods.getLength().call().then(function (length) {
            var i = 0;
            for (let transid = 0, p = Promise.resolve(); transid < length; transid++) {
                p = p.then(_ => new Promise(resolve =>
                    contract.methods.transactions(transid).call().then(function (trans) {
                        if (trans) {
                            let trow = [timeConverter(trans.timestamp), hashToName(trans.sender), hashToName(trans.receiver), trans.scheme, trans.amount];
                            let row = trow.join(",");
                            csvContent += row + "\r\n";
                            resolve();
                            i++;
                        }
                    })
                ));
            }
            var callCsv = setInterval(checkCsv, 1000);
            function checkCsv() {
                if (i == length) {
                    clearInterval(callCsv);
                    downloadCsv(csvContent);
                }
            }
        })
    }
    function downloadCsv(csvContent) {
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.style.display = 'none';
        link.setAttribute("download", "Funds Report.csv");
        link.innerHTML = "Click Here to download";
        document.body.appendChild(link);

        link.click();
        link.remove();
    }
    function hashToName(address) {
        if(address.localeCompare("0xCca7560Aa7362F49F3E3bA3CC6f248f6d34900Ee")==0){
            return "ramu";
        }else if(address.localeCompare("0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508")==0){
            return "kaybee";
        }else if(address.localeCompare("0x0938Bc0ff38CE4ae11FdA2b42AcB6Ca768668170")==0){
            return "nidhi";
        }else{
            return "shardul";
        }
    }
    function nameToHash(uname) {
        /* if(uname.localeCompare("ramu")==0){
			 return "0xCca7560Aa7362F49F3E3bA3CC6f248f6d34900Ee";
		 }else if(uname.localeCompare("kaybee")==0){
			 return "0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508";
		 }else if(uname.localeCompare("nidhi")==0){
			 return "0x0938Bc0ff38CE4ae11FdA2b42AcB6Ca768668170";
		 }else{
			 return "0x4A746fe073C1B1e024B96e1D4bB435f51aC7541a";
		 }*/
        return '0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508';
    }
    function sendEmail(amount,receiver,scheme,email) {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "kbohra89@gmail.com",
            Password: "rabtizaebvftujgd",
            To: email,
            From: "kbohra89@gmail.com",
            Subject: "Notification about fund transfer",
            Body: "Dear Officer,<br><br>" + receiver + " has received " + amount + " for " + scheme,
        });
    }

    function updateProg() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                localStorage.setItem('ts','2020-03-08 13:30:00');
            }
        };
        xmlhttp.open("GET", "updateProg.php", true);
        xmlhttp.send();
    }

    function updateDb(sender,receiver,amt,time_sent,scheme) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
            }
        };
        xmlhttp.open("POST", "addTrans.php?q=" + sender+","+receiver+","+amt+","+time_sent+","+scheme, true);
        xmlhttp.send();
    }
    var j=0;
    function sendFunds(uname,amt,scheme) {
        var email = 'npd@somaiya.edu';
        function getData() {
            receiver = uname;
            if (amt > 0 && !isNaN(amt) && (balance - amt) >= 0) {
                Swal.fire({
                    title: 'Sending the funds...',
                    timerProgressBar:true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                });
                return contract.methods.transferFunds(nameToHash(receiver), amt, scheme)
                    .send({ from: sender_addr })
                    .once('transactionHash',function(hash){
                        console.log(hash);
                        console.log(nameToHash(receiver), amt, scheme);
                    })
                    .on('receipt', function (receipt) {
                        if (receipt) {
                            updateBalance();
                            // updateDb(sender,hashToName(receiver),amt,Date.now(),scheme);
                            updateProg();
                            Swal.fire({
                                icon: 'success',
                                title: 'Funds Disbursed',
                                text: 'Successfully sent money to ' + hashToName(receiver) + '!'
                            }).then(sendEmail(amt,hashToName(receiver),scheme,email));
                        }
                    })
                    .on("error", function (error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: error,
                        });
                    });
            } else if ((balance - amt) < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Insufficient Balance!'
                });
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Enter a valid number!'
                });
            }

        }
        getData();
    }
</script>

</html>
