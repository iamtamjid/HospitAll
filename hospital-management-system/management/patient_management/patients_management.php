<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch all patients from the database
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="patient.css">
</head>
<body>

<header>
    <h1>Patient Management</h1>
    <a href="add_patient.php" class="btn">Add New Patient</a>
</header>

<table>
    <tr>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>City</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['date_of_birth'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['city'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>
                        <a href='edit_patient.php?id=" . $row['patient_id'] . "' class='btn'>Edit</a> 
                        <a href='delete_patient.php?id=" . $row['patient_id'] . "' class='btn'>Delete</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
