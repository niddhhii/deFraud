<?php

$req=$_REQUEST['q'];
$arr=explode(',',$req);

include "dbconnect.php";

$sql="INSERT INTO `transactions`( `sender`, `receiver`, `amount`, `time_sent`, `scheme`) VALUES ('$arr[0]','$arr[1]',$arr[2],'$arr[3]','$arr[4]')";
if($res=$con->query($sql)){
	return "success";
}else{
	return "failure";
}