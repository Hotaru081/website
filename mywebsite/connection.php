<?php
$host ="localhost";
$user ="root";
$password ="";
$database ="website";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn){
	die("Connection Failed: ". mysql_connect_error());
}
?>