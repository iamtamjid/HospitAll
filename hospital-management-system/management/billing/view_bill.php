<?php
// Include database connection
include('../../includes/db_connection.php');

// Check if the bill_id is passed in the URL
if (isset($_GET['id'])) {
    $bill_id = $_GET['id'];

    // Fetch the bill details from the database without the address field
    $sql = "SELECT billing.bill_id, billing.total_amount, billing.billing_date, billing.payment_status, 
            patients.name AS patient_name, patients.phone AS patient_phone
            FROM billing
            JOIN patients ON billing.patient_id = patients.patient_id
            WHERE billing.bill_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the bill exists
    if ($result->num_rows > 0) {
        $bill = $result->fetch_assoc();
    } else {
        echo "Bill not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Bill Details</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="billing.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 36px;
        }
        .invoice-header p {
            font-size: 18px;
            color: #555;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-details th {
            background: #f9f9f9;
        }
        .invoice-footer {
            text-align: right;
            margin-top: 20px;
        }
        .invoice-footer p {
            font-size: 18px;
            font-weight: bold;
        }
        .btn-back {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
        }
        .btn-back:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="invoice-container">

    <!-- Invoice Header -->
    <div class="invoice-header">
        <h1>Hospital Bill</h1>
        <p>Invoice ID: #<?php echo $bill['bill_id']; ?></p>
        <p>Billing Date: <?php echo $bill['billing_date']; ?></p>
    </div>

    <!-- Patient Details -->
    <div class="invoice-details">
        <h3>Patient Information</h3>
        <table>
            <tr>
                <th>Patient Name</th>
                <td><?php echo $bill['patient_name']; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $bill['patient_phone']; ?></td>
            </tr>
        </table>
    </div>

    <!-- Bill Details -->
    <div class="invoice-details">
        <h3>Bill Details</h3>
        <table>
            <tr>
                <th>Total Amount</th>
                <td>$<?php echo number_format($bill['total_amount'], 2); ?></td>
            </tr>
            <tr>
                <th>Payment Status</th>
                <td><?php echo ucfirst($bill['payment_status']); ?></td>
            </tr>
        </table>
    </div>

    <!-- Footer -->
    <div class="invoice-footer">
        <p>Total Amount Due: $<?php echo number_format($bill['total_amount'], 2); ?></p>
    </div>

    <!-- Back Button -->
    <a href="index.php" class="btn-back">Back to Billing Management</a>

</div>

</body>
</html>

<?php
$conn->close();
?>
