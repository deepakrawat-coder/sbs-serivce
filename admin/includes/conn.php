<?php
// echo('csdcsdcds');die;
$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'sbs_service';
$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
  die('connection failed:' . $conn->connect_error);
}

include ('config.php');
