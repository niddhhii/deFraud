<!DOCTYPE html>
<html lang="en">
<?php include 'dbconnect.php';
?>
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
<link rel="stylesheet" href="css/progress.css"/>
<link href="dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/modal.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
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
<?php
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
<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">


  <ul class="navbar-nav mr-auto">
      <img src="img/money.png" height="73px" width="80px" style="padding:10px;margin-top:5px;background-color: white" >
      <li><h1 style="color: black;font-size: 50px; background-color: white;height: 78px;width: 220px;padding-top: 15px">deFraud</h1></li>
  </ul>
  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto" style="font-size: 17px">
      <li class="nav-item no-arrow">
          <a class="nav-link " href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboard</a></li>
      <li class="nav-item no-arrow" style="font-size: 17px">
          <a class="nav-link" href="#SchemeModal" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: white;color: black;" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <a class="dropdown-item" onclick="logout()" style="cursor: pointer">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
              </a>
          </div>
      </li>

    </ul>

</nav>
<!-- End of Topbar -->
</div>
<h1 class="w3-center"><?php echo $_SESSION['scheme']?></h1>
<hr>
<?php
$scheme=$_SESSION['scheme']='Welfare scheme for railway officers';
$user_query="select * from transactions where scheme='$scheme'";
$user_res=$con->query($user_query);

if($res=$user_res->num_rows>0) {
	echo '<div class="container"> <ul class="progressbar">';
	while ($row = $user_res->fetch_assoc()) {
		$sender = $row['sender'];
		$receiver = $row['receiver'];
		$amt = $row['amount'];
		$time_sent = $row['time_sent'];
		$category = $row['category'];
		if($time_sent=='0000-00-00 00:00:00'){
			echo '<li class="upnext">'.$category.' </li>';
		}else{
			echo '<li class="active">'.$category.'</li>';
		}

	}
	if($category=='District' && $time_sent!='0000-00-00 00:00:00'){
		echo '<li class="active">Beneficiaries</li></ul>
		  </div>';
	}else if($category=='District' && $time_sent=='0000-00-00 00:00:00'){
		echo '<li class="upnext">Beneficiaries</li></ul>
		  </div>';
	}

}?>
<style>
    td button{
        width: 100%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-between" >What is Lorem Ipsum?
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            Why do we use it?
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            Where does it come from?
            Contrary to popular belief, Lorem Ipsum is not simply random text.</div>
        <div class="col-md-6 " >
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
					<?php
					echo '<h6 class="w3-center">Pending requests</h6>';
					$i=1;
					$_SESSION['category']='District';
					$scheme=$_SESSION['scheme']="Welfare scheme for railway officers";
					$sql="select * from requests where scheme='$scheme'";
					$outres=$con->query($sql);
					if($outres->num_rows>0){
						while ($row=$outres->fetch_assoc()){
							$uname=$row['uname'];
							$scheme=$row['scheme'];
							$cat=$row['cat'];
							$amt=$row['amt'];



							if($_SESSION['category']=='State' && $cat=='District'){
								echo '<script>var uname="'.$uname.'";</script>';
								echo '<script>var amt='.$amt.';</script>';
								echo '<script>var scheme="'.$scheme.'";</script>';
								echo '<tr class="p-4">
                                                <th scope="row">'.$i.'</th>
                                                <td class="w3-padding-large">'.$uname.'</td>
                                                <td class="w3-padding-large">'.$amt.'</p></td>
                                                <td class="w3-padding-large"><button class="btn btn-primary" onclick="sendFunds(uname,amt,scheme);">PAY</button></td>
                                            </tr>';
								$i++;
							}
							else if($_SESSION['category']=='District' && $cat=='Normal'){
								echo '<script>var uname="'.$uname.'";</script>';
								echo '<script>var amt='.$amt.';</script>';
								echo '<script>var scheme="'.$scheme.'";</script>';
								echo '<tr class="p-4">
                                                <th scope="row">'.$i.'</th>
                                                <td class="w3-padding-large">'.$uname.'</td>
                                                <td class="w3-padding-large">'.$amt.'</p></td>
                                                <td class="w3-padding-large"><button class="btn btn-primary" onclick="sendFunds(uname,amt,scheme);">PAY</button></td>
                                            </tr>';
								$i++;
							}else if($_SESSION['category']=='Central' && $cat=='State'){
								echo '<script>var uname="'.$uname.'";</script>';
								echo '<script>var amt='.$amt.';</script>';
								echo '<script>var scheme="'.$scheme.'";</script>';
								echo '<tr class="p-4">
                                                <th scope="row">'.$i.'</th>
                                                <td class="w3-padding-large">'.$uname.'</td>
                                                <td class="w3-padding-large">'.$amt.'</p></td>
                                                <td class="w3-padding-large"><button class="btn btn-primary" onclick="sendFunds(uname,amt,scheme);">PAY</button></td>
                                            </tr>';
								$i++;
							}

						}
					}

					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="logout_js.js"></script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>