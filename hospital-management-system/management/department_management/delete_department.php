<?php
include('../../includes/db_connection.php');  // Ensure the correct path to db_connection.php

// Check if the 'dept_id' parameter is set
if (isset($_GET['dept_id'])) {
    $dept_id = $_GET['dept_id'];

    // SQL query to delete the department based on dept_id
    $query = "DELETE FROM departments WHERE dept_id = ?";
    
    // Prepare the query
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind the dept_id parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, 'i', $dept_id);
        
        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the departments list page after successful deletion
            header("Location: index.php?status=success");
            exit();
        } else {
            // Handle the error if the deletion fails
            echo "Error: " . mysqli_error($conn);
        }
        
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare statement.";
    }
} else {
    echo "Invalid department ID.";
}

// Close the database connection
mysqli_close($conn);
?>
