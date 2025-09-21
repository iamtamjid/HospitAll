<?php
// Include database connection
include('../../includes/db_connection.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ward_name = $_POST['ward_name'];
    $ward_type = $_POST['ward_type'];
    $floor = $_POST['floor'];
    $capacity = $_POST['capacity'];
    $occupied = $_POST['occupied'];

    $sql = "INSERT INTO wards (ward_name, ward_type, floor, capacity, occupied) 
            VALUES ('$ward_name', '$ward_type', '$floor', '$capacity', '$occupied')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
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
    <title>Add Resource</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="resource.css">

</head>
<body>

<header>
        <h1>Add New Resource - Ward</h1>
</header>
    <form action="add_resource.php" method="POST">
        <label for="ward_name">Ward Name:</label>
        <input type="text" name="ward_name" required><br>

        <label for="ward_type">Ward Type:</label>
        <input type="text" name="ward_type" required><br>

        <label for="floor">Floor:</label>
        <input type="number" name="floor" required><br>

        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" required><br>

        <label for="occupied">Occupied:</label>
        <input type="number" name="occupied" required><br>

        <button type="submit" class="btn">Update Department</button>
    </form>

</body>
</html>

<?php
$conn->close();
?>
