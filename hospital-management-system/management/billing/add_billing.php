<?php
// Include database connection
include('../../includes/db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $patient_id = $_POST['patient_id'];
    $total_amount = $_POST['total_amount'];
    $billing_date = $_POST['billing_date'];
    $payment_status = $_POST['payment_status'];

    // Insert the new billing record into the database
    $sql = "INSERT INTO billing (patient_id, total_amount, billing_date, payment_status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $patient_id, $total_amount, $billing_date, $payment_status);

    if ($stmt->execute()) {
        // Redirect to index.php after successful insertion
        header("Location: index.php");  // Change to your desired page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Billing</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="billing.css">
</head>
<body>

<header>
    <h1>Add Billing</h1>
    <a href="index.php" class="btn">Back to Billing List</a> <!-- Go back to the billing management index page -->
</header>

<form action="add_billing.php" method="POST">
    <label for="patient_id">Patient ID:</label>
    <input type="number" id="patient_id" name="patient_id" required>

    <label for="total_amount">Total Amount:</label>
    <input type="number" step="0.01" id="total_amount" name="total_amount" required>

    <label for="billing_date">Billing Date:</label>
    <input type="date" id="billing_date" name="billing_date" required>

    <label for="payment_status">Payment Status:</label>
    <select id="payment_status" name="payment_status" required>
        <option value="Paid">Paid</option>
        <option value="Unpaid">Unpaid</option>
    </select>

    <button type="submit" class="btn">Add Bill</button>
</form>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
