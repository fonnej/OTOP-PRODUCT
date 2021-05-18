<?php 

    $conn = mysqli_connect("localhost", "root", "12345678", "pro");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>
