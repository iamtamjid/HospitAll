<?php
// Include database connection
include('../../includes/db_connection.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST['medicine_name'];
    $expiry_date = $_POST['expiry_date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Insert new medicine into the database
    $sql = "INSERT INTO medicine (medicine_name, expiry_date, quantity, price) 
            VALUES ('$medicine_name', '$expiry_date', $quantity, $price)";

    if ($conn->query($sql) === TRUE) {
        echo "New medicine added successfully!";
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
    <title>Add Medicine</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="medicine.css">
</head>
<body>
    <header>
        <h1>Add New Medicine</h1>
    </header>

    <form method="POST" action="add_medicine.php">
        <label for="medicine_name">Medicine Name:</label>
        <input type="text" name="medicine_name" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="date" name="expiry_date" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>

        <button type="submit">Add Medicine</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
