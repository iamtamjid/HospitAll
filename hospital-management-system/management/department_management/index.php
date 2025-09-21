<?php
include('../../includes/db_connection.php');  // Adjust the path if needed

// Query to fetch department data
$query = "SELECT * FROM departments";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments Management</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="department.css">
</head>
<body>

    <header>
        <h1>Department Management</h1>
        <a href="add_department.php" class="btn">Add New Department</a>
    </header>

    <table>
        <thead>
            <tr>
                <th>Department ID</th>  <!-- Added Department ID Column -->
                <th>Department Name</th>
                <th>Location</th>
                <th>Head of Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['dept_id'] ?></td>  <!-- Department ID -->
                <td><?= $row['dept_name'] ?></td>
                <td><?= $row['location'] ?></td>
                <td><?= $row['dept_head'] ?></td>
                <td>
                    <a href="edit_department.php?dept_id=<?= $row['dept_id'] ?>" class="btn">Edit</a>
                    <a href="delete_department.php?dept_id=<?= $row['dept_id'] ?>" class="btn">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>
