<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed!");
}
