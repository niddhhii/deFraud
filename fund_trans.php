<!DOCTYPE html>
<html lang="en">
<?php include "dbconnect.php";?>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <h3 id='senderId' style="float: right;">State Ministry</h3>
    <center>
        <h4 id='deptId'>Health Department</h4><br>
        <h5 id='schemeId'>Health For All</h5>
    </center>
    Enter Amount:
    <input type="number" id="amt" min='1' step="1" onkeypress="return event.charCode >= 48" />
    <button type="submit" onclick="sendTransaction()">Submit</button><br><br>
    <p id="txStatus"></p>

    Enter hash to get balance:
    <input type="text" id="hash" />
    <button type="submit" onclick="getBalance()">Submit</button>
    <p id="balance"></p><br>
    <button onclick="genReport()">Generate report</button>
    <p id='notifs'></p>
    <p id='track'></p>
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
    <script>
        let receiver, schemeId, contract, newLen, balance;

        function startApp() {
            let abi=[{"constant":false,"inputs":[{"internalType":"address","name":"_receiver","type":"address"},{"internalType":"uint256","name":"_amount","type":"uint256"},{"internalType":"string","name":"_scheme","type":"string"}],"name":"transferFunds","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getLength","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"string","name":"_owner","type":"string"}],"name":"hash","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"transactions","outputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"receiver","type":"address"},{"internalType":"string","name":"scheme","type":"string"},{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"timestamp","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"_owner","type":"address"}],"name":"uname","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"}];
            let fundsAddress = "0x9F2203Be246a2eF67a79a95AB589D4968B4a9B6B";
            let web3 = new Web3('http://localhost:8545');
            contract = new web3.eth.Contract(abi, fundsAddress);
            newLen = 0;
            schemeId = $("schemeId").text();
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
            getTransactions();
            track();
        }, 100);

        function wait(time) {
            for (let i = 0; i < time; i++);
        }
        function getTransactions() {
            var notifs;
            contract.methods.getLength().call().then(function (length) {
                if (newLen !== length) {
                    for (let transid = newLen; transid < length; transid++) {
                        contract.methods.transactions(transid).call((err, trans) => {
                            if (trans && trans.receiver === receiver1) {
                                notifs = $('#notifs').html();
                                notifs += trans.sender + ' ' + trans.receiver + ' ' +timeConverter(trans.timestamp) +' ' + trans.amount +' ' + trans.scheme+'<br>';
                                $('#notifs').html(notifs);
                            }
                        });
                        wait(10000000);
                    }
                    newLen = length;
                }
            })
        }

        function track() {
            var track;
            contract.methods.getLength().call().then(function (length) {
                if (newLen != length) {
                    for (let transid = newLen; transid < length; transid++) {
                        contract.methods.transactions(transid).call((err, trans) => {
                            if (trans && trans.scheme == schemeId) {
                                track = $('#track').html();
                                track += hashToName(trans.sender) + '&nbsp;&nbsp;' + hashToName(trans.receiver) + '&nbsp;&nbsp;' + timeConverter(trans.timestamp) + '&nbsp;&nbsp;' + trans.amount + '&nbsp;&nbsp;' + trans.scheme + '<br>';
                                $('#track').html(track);
                            }
                        });
                        wait(10000000);
                    }
                    newLen = length;
                }
            })
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
            if(address==="0xCca7560Aa7362F49F3E3bA3CC6f248f6d34900Ee"){
                return "ramu";
            }else if(address==="0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508"){
                return "kaybee";
            }else if(address==="0x0938Bc0ff38CE4ae11FdA2b42AcB6Ca768668170"){
                return "nidhi";
            }else{
                return "hunain";
            }
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

        function updateDb(sender,receiver,amt,time_sent,scheme) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                }
            };
            xmlhttp.open("POST", "addTrans.php?q=" + sender+","+receiver+","+amt+","+time_sent+","+scheme, true);
            xmlhttp.send();
        }

        function sendTransaction() {
            var receiver, userAccount;
            var amt = $('#amt').val();
            var scheme = $('#schemeId').html();
            var deptName = 'National Health Department';
            var schemeName = 'Health For All';
            var email = 'npd@somaiya.edu';
            function getData() {
                receiver = '0x96aFC09b5b54c083E3B0Bf2bDe4A62cfD6c10508';
                if (amt > 0 && !isNaN(amt) && (balance - amt) >= 0) {
                    $('#amt').val('');
                    Swal.fire({
                        title: 'Sending the funds...',
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    });
                    return contract.methods.transferFunds(receiver, amt, scheme)
                        .send({ from: senderAddr })
                        .once('transactionHash',function(hash){
                            console.log(hash);
                        })
                        .on('receipt', function (receipt) {
                            if (receipt) {

                                updateBalance();
                                updateDb(sender_name,receiver_name,amt,time_sent,scheme);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Funds Disbursed',
                                    text: 'Successfully sent money to ' + hashToName(receiver) + '!'
                                })
                                .then(sendEmail(amt,deptName,schemeName,email));
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
                    $('#amt').val('');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Insufficient Balance!'
                    });
                }
                else {
                    $('#amt').val('');
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
</body>
</html>