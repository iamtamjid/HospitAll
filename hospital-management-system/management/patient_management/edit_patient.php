<?php
// Include database connection
include('../../includes/db_connection.php');

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Fetch the patient's current details
    $sql = "SELECT * FROM patients WHERE patient_id = $patient_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
    } else {
        echo "Patient not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input data from the form
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    // Update the patient's details in the database
    $sql = "UPDATE patients SET 
                name = '$name', 
                date_of_birth = '$date_of_birth', 
                gender = '$gender', 
                city = '$city', 
                phone = '$phone' 
            WHERE patient_id = $patient_id";

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
    <title>Edit Patient</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="patient.css">

</head>
<body>

<header>
    <h1>Edit Patient</h1>
    <a href="patients_management.php" class="btn">Back to Patient Management</a>
</header>

<form action="edit_patient.php?id=<?php echo $patient_id; ?>" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $patient['name']; ?>" required>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $patient['date_of_birth']; ?>" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male" <?php echo ($patient['gender'] == 'Male' ? 'selected' : ''); ?>>Male</option>
        <option value="Female" <?php echo ($patient['gender'] == 'Female' ? 'selected' : ''); ?>>Female</option>
        <option value="Other" <?php echo ($patient['gender'] == 'Other' ? 'selected' : ''); ?>>Other</option>
    </select>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="<?php echo $patient['city']; ?>">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $patient['phone']; ?>">

    <button type="submit" class="btn">Update Patient</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
