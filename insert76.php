<?php

include 'conn.php'; 
// Retrieve form data and sanitize inputs
$program = $_POST['program'];
$course =  $_POST['course'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$age = mysqli_real_escape_string($conn, $_POST['age']);

// Prepare and execute SQL query
$sql = "INSERT INTO tblstudentreg (programcode, coursecode,name, email, age) VALUES ('$program', '$course','$name', '$email', '$age')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
