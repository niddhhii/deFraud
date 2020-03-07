<?php

include 'dbconnect.php';

function sendSMS($num,$otp){
	$apiKey = urlencode('FoK0W4xRlU0-tufoL9Rn04n4fyAVfAISLB7LGMfIWC');

	// Message details
	$number = $num;
	$sender = urlencode('deFraud');
	$message = rawurlencode($otp);


	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $number, "sender" => $sender, "message" => $message);

	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);

	echo $response;
}

if(isset($_POST['submit'])) {
	$_SESSION['uname']=$username = $_POST['uname'];
	$_SESSION['pwd']=$pwd = $_POST['pwd'];
	$_SESSION['pan']=$pan = $_POST['pan'];
	$_SESSION['category']=$category = $_POST['category'];

	$addsql = "select * from pan where pan='$pan'";

	$res = $con->query($addsql);

	if ($res->num_rows == 1) {
		if ($row = $res->fetch_assoc()) {
			$_SESSION['name'] = $row['name'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['phone'] =$phone= $row['phone'];
			$_SESSION['dob'] = $row['dob'];
			$_SESSION['otp'] = $rand = rand(1000, 9999);
			sendSMS($phone, $rand);
		}
	} else {
		return "Invalid PAN Card";
	}
}