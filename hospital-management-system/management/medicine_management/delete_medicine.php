<?php
// Include database connection
include('../../includes/db_connection.php');

// Check if the 'id' parameter is passed
if (isset($_GET['id'])) {
    $medicine_id = $_GET['id'];

    // Delete the medicine from the database
    $sql = "DELETE FROM medicine WHERE medicine_id = $medicine_id";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine deleted successfully!";
        header("Location: index.php"); // Redirect to index page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
