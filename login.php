<?php

include 'dbconnect.php';

if(isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	$addsql = "select * from user where user='$uname'";

	$res = $con->query($addsql);

	if ($res->num_rows == 1) {
		if ($row = $res->fetch_assoc()) {
			$ogpwd=$row['pwd'];
			if($ogpwd==$pwd) {
				$_SESSION['user_id'] = $uname;
			}
		}
	} else {
		return "Invalid user";
	}
}