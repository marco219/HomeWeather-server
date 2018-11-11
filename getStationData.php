<?php

$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$dbname = "weather_data";
$station_id = $_GET["station_id"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rows = Array();
$sql  = 'SELECT * FROM '.$station_id.' order by id desc limit 100';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($rows[] = $result->fetch_assoc());
    echo json_encode($rows);
    }
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
