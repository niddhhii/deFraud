<?php

include 'dbconnect.php';

if(isset($_POST['submit_otp'])) {
	$otp = $_POST['otp'];
	if($otp==$_SESSION['otp']){
		$name=$_SESSION['name'];
		$uname=$_SESSION['uname'];
		$pwd=$_SESSION['pwd'];
		$pan=$_SESSION['pan'];
		$fname=$_SESSION['fname'] ;
		$category=$_SESSION['category'] ;
		$dob=$_SESSION['dob'] ;
		$adduser="INSERT INTO `user`(`name`, `fname`, `uname`, `pwd`, `pan`, `dob`, `balance`, `category`) VALUES ('$name','$fname','$uname','$pwd','$pan','$dob',0,'$category')";
		if($res = $con->query($adduser)){
			return "User added";
		}else{
			return "User was not added";
		}
	}else{
		return "OTP verification failed";
	}
}