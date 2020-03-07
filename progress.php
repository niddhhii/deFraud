<html>
<head>
	<link rel="stylesheet" href="css/progress.css"/>
</head>

<?php
include 'dbconnect.php';
$scheme=$_SESSION['scheme']='Health for all';
$user_query="select * from transactions where scheme='$scheme'";
$user_res=$con->query($user_query);
echo '<p id="fund_progress">FUND PROGRESS</p><hr>';

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
</html>