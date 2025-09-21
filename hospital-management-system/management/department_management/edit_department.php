<?php
include('../../includes/db_connection.php');  // Adjust the path if needed

if (isset($_GET['dept_id'])) {
    $dept_id = $_GET['dept_id'];

    // Fetch department data
    $query = "SELECT * FROM departments WHERE dept_id = '$dept_id'";
    $result = mysqli_query($conn, $query);
    $department = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dept_name = $_POST['dept_name'];
    $location = $_POST['location'];
    $dept_head = $_POST['dept_head'];

    // Update department in database
    $query = "UPDATE departments SET dept_name='$dept_name', location='$location', dept_head='$dept_head' WHERE dept_id='$dept_id'";
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
    <title>Edit Department</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="department.css">
</head>
<body>

    <header>
        <h1>Edit Department</h1>
        <a href="index.php" class="btn">Back to Departments</a>
    </header>

    <form action="edit_department.php?dept_id=<?= $dept_id ?>" method="POST">
        <label for="dept_name">Department Name</label>
        <input type="text" name="dept_name" value="<?= $department['dept_name'] ?>" required>

        <label for="location">Location</label>
        <input type="text" name="location" value="<?= $department['location'] ?>" required>

        <label for="dept_head">Head of Department</label>
        <input type="text" name="dept_head" value="<?= $department['dept_head'] ?>" required>

        <button type="submit" class="btn">Update Department</button>
    </form>

</body>
</html>
