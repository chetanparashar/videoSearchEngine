<?php
include('dbCredentials.php');
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE videos";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
    echo "<br>";
}

$conn = new mysqli($servername, $username, $password,'videos');
$sql_table="CREATE TABLE search_video_log (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
video_id VARCHAR(50) NOT NULL,
page_token VARCHAR(50) NOT NULL,
search_term VARCHAR(200) NOT NULL,
title VARCHAR(200) NOT NULL,
thumbnails VARCHAR(100) NOT NULL,
created_at datetime
) ";
if ($conn->query($sql_table) === TRUE) {
    echo "table created successfully";
} else {
    echo "Error creating database: " . $conn->error;
    echo "<br>";
}
$conn->close();
