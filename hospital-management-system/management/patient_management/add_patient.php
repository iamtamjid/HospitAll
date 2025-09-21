<?php
// Include database connection
include('../../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input data from the form
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    // Insert the data into the database
    $sql = "INSERT INTO patients (name, date_of_birth, gender, city, phone) 
            VALUES ('$name', '$date_of_birth', '$gender', '$city', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: patients_management.php");
        exit;
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
    <title>Add New Patient</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="patient.css">

</head>
<body>

<header>
    <h1>Add New Patient</h1>
    <a href="patients_management.php" class="btn">Back to Patient Management</a>
</header>

<form action="add_patient.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="city">City:</label>
    <input type="text" id="city" name="city">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone">

    <button type="submit" class="btn">Add Patient</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
