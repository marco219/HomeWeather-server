<?php

$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$dbname = "weather_data";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rows = Array();
$sql  = 'SELECT * FROM station_0 order by id desc limit 1';
$sql2  = 'SELECT * FROM station_1 order by id desc limit 1';
$sql3  = 'SELECT * FROM station_2 order by id desc limit 1';
$sql4  = 'SELECT * FROM station_3 order by id desc limit 1';

$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

if (($result->num_rows > 0) && ($result2->num_rows > 0)&& ($result3->num_rows > 0)&& ($result4->num_rows > 0)) {
    $rows[] = $result->fetch_assoc();
    $rows[] = $result2->fetch_assoc();
    $rows[] = $result3->fetch_assoc();
    $rows[] = $result4->fetch_assoc();
    echo json_encode($rows);
    }
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
