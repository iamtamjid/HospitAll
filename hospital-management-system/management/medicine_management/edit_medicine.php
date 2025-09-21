<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch the medicine data to edit
if (isset($_GET['id'])) {
    $medicine_id = $_GET['id'];
    $sql = "SELECT * FROM medicine WHERE medicine_id = $medicine_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $medicine = $result->fetch_assoc();
    } else {
        echo "Medicine not found.";
        exit();
    }
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicine_name = $_POST['medicine_name'];
    $expiry_date = $_POST['expiry_date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE medicine 
            SET medicine_name='$medicine_name', expiry_date='$expiry_date', quantity=$quantity, price=$price 
            WHERE medicine_id=$medicine_id";

    if ($conn->query($sql) === TRUE) {
        echo "Medicine updated successfully!";
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
    <title>Edit Medicine</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="medicine.css">
</head>
<body>
    <header>
        <h1>Edit Medicine</h1>
    </header>

    <form method="POST" action="edit_medicine.php?id=<?php echo $medicine_id; ?>">
        <label for="medicine_name">Medicine Name:</label>
        <input type="text" name="medicine_name" value="<?php echo $medicine['medicine_name']; ?>" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="date" name="expiry_date" value="<?php echo $medicine['expiry_date']; ?>" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $medicine['quantity']; ?>" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $medicine['price']; ?>" required>

        <button type="submit">Update Medicine</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
