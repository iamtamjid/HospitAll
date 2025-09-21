<?php
include('../../includes/db_connection.php');

// Query to fetch employee data
$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="employee.css">
    <script>
        function filterEmployees(role) {
            var rows = document.querySelectorAll('.employee-row');
            rows.forEach(function(row) {
                if (role === 'All' || row.classList.contains(role)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</head>
<body>

    <header>
        <h1>Employee Management</h1>
        <a href="add_employee.php" class="btn">Add New Employee</a>
    </header>

    <div class="filter">
    <a href="#" class="btn" onclick="filterEmployees('Doctor')">Doctors</a>
    <a href="#" class="btn" onclick="filterEmployees('Nurse')">Nurses</a>
    <a href="#" class="btn" onclick="filterEmployees('Staff')">Staff</a>
    <a href="#" class="btn" onclick="filterEmployees('All')">Show All</a>
    </div>



    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <!-- Assign role classes for filtering -->
                <tr class="employee-row <?= $row['roll'] ?>">
                    <td><?= $row['first_name'] . " " . $row['mid_name'] . " " . $row['last_name'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['date_of_birth'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['salary'] ?></td>
                    <td>
                        <a href="edit_employee.php?employee_id=<?= $row['employee_id'] ?>" class="btn">Edit</a>
                        <a href="delete_employee.php?employee_id=<?= $row['employee_id'] ?>" class="btn">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>
