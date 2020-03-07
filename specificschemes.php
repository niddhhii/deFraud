<!DOCTYPE html>
<html lang="en">
<head>
<title>deFraud</title>
<link rel="shortcut icon" href="img/money.png" type="image/x-icon">
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="db_central.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/modal.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style>
  
    .my-custom-scrollbar {
    position: relative;
    height: 400px;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    
    }
</style>
<body>
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">


  <ul class="navbar-nav mr-auto">
      <img src="img/money.png" height="73px" width="80px" style="padding:10px;margin-top:5px;background-color: white" >
      <li><h1 style="color: black;font-size: 50px; background-color: white;height: 78px;width: 220px;padding-top: 15px">deFraud</h1></li>
  </ul>
  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto" style="font-size: 17px">
      <li class="nav-item no-arrow">
          <a class="nav-link " href="#" id="messagesDropdown" style="background-color: white;color: black;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboard</a></li>
      <li class="nav-item no-arrow" style="font-size: 17px">
          <a class="nav-link" href="#SchemeModal" data-toggle="modal" data-target=".bd-example-modal-lg" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
              </a>
          </div>
      </li>

  </ul>

</nav>
<!-- End of Topbar -->
</div>
<div style="margin-top: 300px;background-color: wheat;">x</div>
<div class="container">
    <div class="row">
        <div class="col-md-5   d-flex justify-content-between" >What is Lorem Ipsum?
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            
            Why do we use it?
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            
            
            Where does it come from?
            Contrary to popular belief, Lorem Ipsum is not simply random text.</div>
        <div class="col-md-2 justify-content-between"></div>
            <div class=" col-md-5 d-flex justify-content-between" >
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

                <table class="table table-bordered table-striped table-hover mb-0">
                  <thead class="thead-dark">
                    <tr class="p-4">
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Pay</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="p-4">
                      <th scope="row">1</th>
                      <td class="w3-padding-large">Hunain</td>
                      <td class="w3-padding-large">10000</p></td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                      <th scope="row">2</th>
                      <td class="w3-padding-large">Jacob</td>
                      <td class="w3-padding-large">Thornton</td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                      <th scope="row">3</th>
                      <td class="w3-padding-large">Larry</td>
                      <td class="w3-padding-large">the Bird</td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                      <th scope="row">4</th>
                      <td class="w3-padding-large">Mark</td>
                      <td class="w3-padding-large">Otto</td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                      <th scope="row">5</th>
                      <td class="w3-padding-large">Jacob</td>
                      <td class="w3-padding-large">Thornton</td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                      <th scope="row">6</th>
                      <td class="w3-padding-large">Larry</td>
                      <td class="w3-padding-large">the Bird</td>
                      <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                    </tr>
                    <tr class="p-4">
                        <th scope="row">1</th>
                        <td class="w3-padding-large"></td>
                        <td class="w3-padding-large">Otto</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">2</th>
                        <td class="w3-padding-large">Jacob</td>
                        <td class="w3-padding-large">Thornton</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">3</th>
                        <td class="w3-padding-large">Larry</td>
                        <td class="w3-padding-large">the Bird</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">4</th>
                        <td class="w3-padding-large">Mark</td>
                        <td class="w3-padding-large">Otto</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">5</th>
                        <td class="w3-padding-large">Jacob</td>
                        <td class="w3-padding-large">Thornton</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">6</th>
                        <td class="w3-padding-large">Larry</td>
                        <td class="w3-padding-large">the Bird</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">1</th>
                        <td class="w3-padding-large"></td>
                        <td class="w3-padding-large">Otto</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">2</th>
                        <td class="w3-padding-large">Jacob</td>
                        <td class="w3-padding-large">Thornton</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">3</th>
                        <td class="w3-padding-large">Larry</td>
                        <td class="w3-padding-large">the Bird</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">4</th>
                        <td class="w3-padding-large">Mark</td>
                        <td class="w3-padding-large">Otto</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">5</th>
                        <td class="w3-padding-large">Jacob</td>
                        <td class="w3-padding-large">Thornton</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                      <tr class="p-4">
                        <th scope="row">6</th>
                        <td class="w3-padding-large">Larry</td>
                        <td class="w3-padding-large">the Bird</td>
                        <td class="w3-padding-large"><button class="btn btn-primary w3-padding-large">PAY</button></td>
                      </tr>
                  </tbody>
                </table>
              
              </div>
        </div>
    </div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>