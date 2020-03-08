<?php

include 'dbconnect.php';

$sql="UPDATE `transactions` SET time_sent='2020-03-08 13:30:00' where id=3";
if($con->query($sql)){
	echo "<script>alert('hello')</script>";
}
return "success";
