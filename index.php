<!DOCTYPE html>
<html lang="en">
<title>deFraud</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="dashboard.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/modal.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<script>


    function sign() {
        Swal.mixin({

            confirmButtonText: 'Next &rarr;',
            showCancelButton: true,
            progressSteps: ['1', '2', '3']
        }).queue([
            {
                title: 'Personal Details',
                html: "<div class='b'><br><p>Username</p></div><input id='swal-input2' class='swal2-input' required/><div class='b'><p>Password</p></div><input id='swal-input1' class='swal2-input' autofocus minlength='500' >"
            },
            {
                title: 'KYC details',
                html: "<div class='b'><p>Pan Number</p></div><input id='swal-input2' class='swal2-input' required/>  "
            },
            {
                title: 'Enter OTP:',
                html: "<div class='b'></div><input id='swal-input2' class='swal2-input' required/> "
            }
        ]).then((result) => {
            if (result.value) {
                const answers = result.value;
                Swal.fire({
                    title: 'All done!',
                    html: `
          Welcome to deFraud!
        `,
                    confirmButtonText: 'Lovely!'
                })
            }
        })
    }</script>
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Lato", sans-serif
    }

    .w3-bar, h1, button {
        font-family: "Montserrat", sans-serif
    }

    .fa-anchor, .fa-coffee {
        font-size: 200px
    }

    .modal-notify .modal-header {
        border-radius: 3px 3px 0 0;
    }

    .modal-notify .modal-content {
        border-radius: 3px;
    }
</style>
<body>

<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">


    <ul class="navbar-nav mr-auto">
        <img src="img/money.png" height="73px" width="80px" style="padding:10px;margin-top:5px;background-color: white" >
        <li><h1 style="color: black;font-size: 50px; background-color: white;height: 78px;width: 220px;padding-top: 15px">deFraud</h1></li>
    </ul>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item no-arrow" style="font-size: 23px;padding: 15px;">
            <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;background-color: white">
                Home</a></li>
        <li class="nav-item no-arrow" style="font-size: 23px;padding: 15px;">
            <a class="nav-link" href="scheme.php" role="button" aria-haspopup="true" aria-expanded="false" style="color: white">
                Schemes</a></li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item no-arrow" onclick="sign()" style="font-size: 23px;padding: 15px">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                Sign Up</a></li>
        <li class="nav-item no-arrow"  style="font-size: 23px;padding: 15px">
            <a class="nav-link" href="#orangeModalSubscription" role="button" data-toggle="modal" data-target="#orangeModalSubscription" style="color: white" aria-haspopup="true" aria-expanded="false">
                Sign In</a></li>
    </ul>

</nav>

<header class="w3-container w3-center" style="padding:128px 16px">
    <h1 class=" w3-jumbo ">deFraud</h1>
    <p class="w3-xlarge">For a fraud free government</p>
    <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" data-toggle="modal"
            data-target="#orangeModalSubscription">Sign In
    </button>
</header>
<div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2" style="font-size: 30px;margin-left: 50px">SIGN IN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form3" style="font-size: 20px"> Username</label>
                    <input type="text" id="form3" class="form-control validate">
                </div>

                <div class="md-form">
                    <i class="fas fa-key prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="form2" style="font-size: 20px"> Password</label>
                    <input type="password" id="form2" class="form-control validate">
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-primary waves-effect" href="dashboard.php">LOGIN </a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-32">
    <h1 class="w3-margin w3-xlarge"></h1>
    <h1 class="w3-margin w3-xlarge"></h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">

</footer>

<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
