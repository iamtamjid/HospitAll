<?php
include('../../includes/db_connection.php');

// Check if employee_id is set
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];

    // Delete the employee record
    $query = "DELETE FROM employees WHERE employee_id = ?";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $employee_id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=deleted");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($conn);
?>
