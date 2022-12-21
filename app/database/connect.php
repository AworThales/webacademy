<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "webacademy";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("database connection eror: " . $conn->connect_error);
}

?>