<?php
include('../../includes/db_connection.php');  // Adjust the path if needed

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dept_name = $_POST['dept_name'];
    $location = $_POST['location'];
    $dept_head = $_POST['dept_head'];

    // Insert department into database
    $query = "INSERT INTO departments (dept_name, location, dept_head) VALUES ('$dept_name', '$location', '$dept_head')";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="department.css">
</head>
<body>

    <header>
        <h1>Add New Department</h1>
        <a href="index.php" class="btn">Back to Departments</a>
    </header>

    <form action="add_department.php" method="POST">
        <label for="dept_name">Department Name</label>
        <input type="text" name="dept_name" required>

        <label for="location">Location</label>
        <input type="text" name="location" required>

        <label for="dept_head">Head of Department</label>
        <input type="text" name="dept_head" required>

        <button type="submit" class="btn">Add Department</button>
    </form>

</body>
</html>
