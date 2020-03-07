<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "defraud";
$con = new mysqli($servername,$username,$password,$dbname);
if ($con->connect_error)
{
	die('No connection: ' . $con->connect_error);
}
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
} else {
	header("Location: index.php");
}
