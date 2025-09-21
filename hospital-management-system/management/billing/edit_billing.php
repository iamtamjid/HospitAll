<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch the billing record to edit
if (isset($_GET['id'])) {
    $bill_id = $_GET['id'];
    $sql = "SELECT * FROM billing WHERE bill_id = $bill_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $bill = $result->fetch_assoc();
    } else {
        echo "Bill not found.";
        exit();
    }
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_amount = $_POST['total_amount'];
    $billing_date = $_POST['billing_date'];
    $payment_status = $_POST['payment_status'];
    $patient_id = $_POST['patient_id'];

    $sql = "UPDATE billing 
            SET total_amount='$total_amount', billing_date='$billing_date', payment_status='$payment_status', patient_id='$patient_id' 
            WHERE bill_id=$bill_id";

    if ($conn->query($sql) === TRUE) {
        echo "Bill updated successfully!";
        header("Location: index.php"); // Redirect to index page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bill</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="billing.css">
</head>
<body>
    <header>
        <h1>Edit Bill</h1>
    </header>

    <form method="POST" action="edit_billing.php?id=<?php echo $bill_id; ?>">
        <label for="total_amount">Total Amount:</label>
        <input type="number" step="0.01" name="total_amount" value="<?php echo $bill['total_amount']; ?>" required>

        <label for="billing_date">Billing Date:</label>
        <input type="date" name="billing_date" value="<?php echo $bill['billing_date']; ?>" required>

        <label for="payment_status">Payment Status:</label>
        <select name="payment_status" required>
            <option value="Paid" <?php echo $bill['payment_status'] == 'Paid' ? 'selected' : ''; ?>>Paid</option>
            <option value="Unpaid" <?php echo $bill['payment_status'] == 'Unpaid' ? 'selected' : ''; ?>>Unpaid</option>
        </select>

        <label for="patient_id">Patient ID:</label>
        <input type="number" name="patient_id" value="<?php echo $bill['patient_id']; ?>" required>

        <button type="submit">Update Bill</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
