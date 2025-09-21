<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch all wards from the database
$sql = "SELECT * FROM wards";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Allocation - Wards</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="resource.css">

</head>
<body>


    <header>
        <h1>Resource Allocation - Wards</h1>
        <a href="add_resource.php" class="btn">Add New Ward</a>
    </header>
    <table>
        <tr>
            <th>Ward ID</th>
            <th>Ward Name</th>
            <th>Type</th>
            <th>Floor</th>
            <th>Capacity</th>
            <th>Occupied</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['ward_id'] . "</td>
                        <td>" . $row['ward_name'] . "</td>
                        <td>" . $row['ward_type'] . "</td>
                        <td>" . $row['floor'] . "</td>
                        <td>" . $row['capacity'] . "</td>
                        <td>" . $row['occupied'] . "</td>
                        <td>
                            <a href='edit_resource.php?id=" . $row['ward_id'] . "' class='btn'>Edit</a> 
                            <a href='delete_resource.php?id=" . $row['ward_id'] . "' class='btn'>Delete</a>
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
