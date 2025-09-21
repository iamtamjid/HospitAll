<?php
// Include database connection
include('../../includes/db_connection.php');

// Handle resource deletion
if (isset($_GET['id'])) {
    $ward_id = $_GET['id'];

    $sql = "DELETE FROM wards WHERE ward_id = '$ward_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
