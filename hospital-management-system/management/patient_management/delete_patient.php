<?php
// Include database connection
include('../../includes/db_connection.php');

// Get the patient_id from the URL
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Delete query to remove the patient from the database
    $sql = "DELETE FROM patients WHERE patient_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the patient_id to the query
        $stmt->bind_param('i', $patient_id);
        $stmt->execute();

        // Redirect to the patient management page after deletion
        header("Location: patients_management.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Patient ID not provided.";
}

// Close the database connection
$conn->close();
?>
