<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_kas";

$link = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_connect_error($link));

?>