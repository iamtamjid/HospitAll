<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch all patients from the database to select a patient for the bill
$sql_patients = "SELECT * FROM patients";
$patients_result = $conn->query($sql_patients);

// Handle the form submission to generate a bill
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $total_amount = $_POST['total_amount'];
    $payment_status = $_POST['payment_status'];
    $billing_date = date('Y-m-d');  // Current date for billing

    // Insert the new bill into the billing table
    $sql = "INSERT INTO billing (total_amount, billing_date, payment_status, patient_id)
            VALUES ('$total_amount', '$billing_date', '$payment_status', '$patient_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Bill generated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Bill</title>
    <link rel="stylesheet" href="assets/css/resource.css">
</head>
<body>
    <header>
        <h1>Generate Bill</h1>
        <a href="view_bill.php" class="btn">View Bills</a>
    </header>

    <form action="generate_bill.php" method="POST">
        <label for="patient_id">Select Patient</label>
        <select name="patient_id" id="patient_id" required>
            <?php
            if ($patients_result->num_rows > 0) {
                while($row = $patients_result->fetch_assoc()) {
                    echo "<option value='" . $row['patient_id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No patients found</option>";
            }
            ?>
        </select>

        <label for="total_amount">Total Amount</label>
        <input type="number" name="total_amount" id="total_amount" required>

        <label for="payment_status">Payment Status</label>
        <select name="payment_status" id="payment_status" required>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
        </select>

        <button type="submit">Generate Bill</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
