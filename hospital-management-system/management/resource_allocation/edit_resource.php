<?php
// Include database connection
include('../../includes/db_connection.php');

// Fetch the resource data to edit
if (isset($_GET['id'])) {
    $ward_id = $_GET['id'];
    $sql = "SELECT * FROM wards WHERE ward_id = '$ward_id'";
    $result = $conn->query($sql);
    $ward = $result->fetch_assoc();
}

// Update the resource data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ward_name = $_POST['ward_name'];
    $ward_type = $_POST['ward_type'];
    $floor = $_POST['floor'];
    $capacity = $_POST['capacity'];
    $occupied = $_POST['occupied'];

    $sql = "UPDATE wards 
            SET ward_name = '$ward_name', ward_type = '$ward_type', floor = '$floor', 
                capacity = '$capacity', occupied = '$occupied' 
            WHERE ward_id = '$ward_id'";

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
    <title>Edit Resource</title>
    <link rel="stylesheet" href="assets/css/resource.css">
    <link rel="stylesheet" href="resource.css">

</head>
<body>
<header>
<h1>Edit Resource - Ward</h1>

</header>

    <form action="edit_resource.php?id=<?php echo $ward_id; ?>" method="POST">
        <label for="ward_name">Ward Name:</label>
        <input type="text" name="ward_name" value="<?php echo $ward['ward_name']; ?>" required><br>

        <label for="ward_type">Ward Type:</label>
        <input type="text" name="ward_type" value="<?php echo $ward['ward_type']; ?>" required><br>

        <label for="floor">Floor:</label>
        <input type="number" name="floor" value="<?php echo $ward['floor']; ?>" required><br>

        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" value="<?php echo $ward['capacity']; ?>" required><br>

        <label for="occupied">Occupied:</label>
        <input type="number" name="occupied" value="<?php echo $ward['occupied']; ?>" required><br>

        <button type="submit" class="btn">Update Department</button>

    </form>

</body>
</html>

<?php
$conn->close();
?>
