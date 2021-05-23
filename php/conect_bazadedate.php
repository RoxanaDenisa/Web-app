<?php 
$username = "root";
$password = "";
$host="localhost";
$database="inregistreaza";

$link = mysqli_connect($host, $username, $password, $database);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo '';



