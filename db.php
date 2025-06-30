<?php
$host = "localhost";
$user = "root";       // or your DB username
$pass = "";           // or your DB password
$dbname = "court";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
