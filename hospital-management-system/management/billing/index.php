<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch all billing records from the database, joining with the patients table to get the patient name
$sql = "SELECT billing.bill_id, billing.total_amount, billing.billing_date, billing.payment_status, patients.name AS patient_name
        FROM billing
        JOIN patients ON billing.patient_id = patients.patient_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Management</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="billing.css">
</head>
<body>

<header>
    <h1>Billing Management</h1>
    <a href="add_billing.php" class="btn">Add New Bill</a>
</header>

<table>
    <tr>
        <th>Patient Name</th>
        <th>Total Amount</th>
        <th>Billing Date</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['patient_name'] . "</td>
                    <td>" . $row['total_amount'] . "</td>
                    <td>" . $row['billing_date'] . "</td>
                    <td>" . $row['payment_status'] . "</td>
                    <td>
                        <a href='view_bill.php?id=" . $row['bill_id'] . "' class='btn'>View Bill</a> 
                        <a href='edit_billing.php?id=" . $row['bill_id'] . "' class='btn'>Edit</a> 
                        <a href='delete_billing.php?id=" . $row['bill_id'] . "' class='btn' onclick='return confirm(\"Are you sure you want to delete this bill?\")'>Delete</a>
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
