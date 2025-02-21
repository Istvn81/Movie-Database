<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movie.database";

$conn = new mysqli($servername, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("connection error: $conn->connect_error");
}
?>