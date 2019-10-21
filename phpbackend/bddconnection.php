<?php
$conn = new mysqli("localhost:8889", "root", "root", "webservices");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo $mysqli->host_info . "\n";
?>