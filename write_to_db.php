<?php

$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$dbname = "weather_data";
$table = $_GET['station_id'];
$temperature = $_GET['temperature'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO ".$table." (temperature)
VALUES ('".$temperature."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
