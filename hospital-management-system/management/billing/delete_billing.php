<?php
// Include database connection
include('../../includes/db_connection.php');

// Get the bill_id from the URL
$bill_id = $_GET['id'];

// Delete related records from the insurance table
$sql = "DELETE FROM insurance WHERE bill_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bill_id);
$stmt->execute();

// Now, delete the record from the billing table
$sql = "DELETE FROM billing WHERE bill_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bill_id);
$stmt->execute();

// Check if deletion was successful
if ($stmt->affected_rows > 0) {
    // Record deleted successfully, redirect to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit(); // Make sure to call exit() to stop further script execution
} else {
    echo "Error deleting record.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
