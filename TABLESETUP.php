<?php
$servername = "localhost";
$username   = "root";
$password   = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE patientdir";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn = mysqli_connect($servername, $username, $password, 'patientdir');


$sql = "CREATE TABLE patient (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Fname VARCHAR(30) NOT NULL,
Lname VARCHAR(30) NOT NULL,
Age INT(10),
Dob VARCHAR(10),
Gender VARCHAR(8),
Phone VARCHAR(10),
Comment VARCHAR(2000)
)";

if ($conn->query($sql) === TRUE) {
    echo "TABLE CREATED successfully";
    
} else {
    echo "Error creating table: " . $conn->error;
}
?>
