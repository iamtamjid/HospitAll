<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch all medicines from the database
$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Management</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="medicine.css">
</head>
<body>
    <header>
        <h1>Medicine Management</h1>
        <a href="add_medicine.php" class="btn">Add New Medicine</a>
    </header>
    <table>
        <tr>
            <th>Medicine Name</th>
            <th>Expiry Date</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['medicine_name'] . "</td>
                        <td>" . $row['expiry_date'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>
                            <a href='edit_medicine.php?id=" . $row['medicine_id'] . "' class='btn'>Edit</a> 
                            <a href='delete_medicine.php?id=" . $row['medicine_id'] . "' class='btn'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
