<?php
// Include the database connection file
include('../../includes/db_connection.php');

// Check if the employee_id is set
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    
    // Fetch employee details from the database
    $query = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Get employee data
        $employee = mysqli_fetch_assoc($result);
    } else {
        echo "Employee not found.";
        exit;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $mid_name = $_POST['mid_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $date_joined = $_POST['date_joined'];
    $street = $_POST['street'];
    $thana = $_POST['thana'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $dept_id = $_POST['dept_id'];
    $roll = $_POST['roll'];  // Added roll field
    $license_number = isset($_POST['license_number']) ? $_POST['license_number'] : null;
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : null;
    $shift = isset($_POST['shift']) ? $_POST['shift'] : null;
    $staff_role = isset($_POST['staff_role']) ? $_POST['staff_role'] : null;
    
    // Update the employee record
    $update_query = "UPDATE employees SET 
        first_name = '$first_name', 
        mid_name = '$mid_name', 
        last_name = '$last_name', 
        mobile = '$mobile', 
        date_joined = '$date_joined', 
        street = '$street', 
        thana = '$thana', 
        city = '$city', 
        district = '$district', 
        salary = '$salary', 
        gender = '$gender', 
        date_of_birth = '$date_of_birth', 
        dept_id = '$dept_id',
        roll = '$roll',
        license_number = '$license_number',
        specialization = '$specialization',
        shift = '$shift',
        staff_role = '$staff_role'
        WHERE employee_id = '$employee_id'";

    if (mysqli_query($conn, $update_query)) {
        // Redirect to the index page after successful update
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="employee.css">
    <script>
        // Function to toggle input fields based on role selection
        function toggleRoleFields() {
            const role = document.getElementById('roll').value;
            const doctorFields = document.getElementById('doctor-fields');
            const nurseFields = document.getElementById('nurse-fields');
            const staffFields = document.getElementById('staff-fields');
            
            // Toggle display based on role selection
            doctorFields.style.display = (role === 'Doctor') ? 'block' : 'none';
            nurseFields.style.display = (role === 'Nurse') ? 'block' : 'none';
            staffFields.style.display = (role === 'Staff') ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <header>
        <h1>Edit Employee Details</h1>
    </header>

    <form action="edit_employee.php?employee_id=<?= $employee_id ?>" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= $employee['first_name'] ?>" required>

        <label for="mid_name">Middle Name:</label>
        <input type="text" id="mid_name" name="mid_name" value="<?= $employee['mid_name'] ?>">

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= $employee['last_name'] ?>" required>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?= $employee['mobile'] ?>" required>

        <label for="date_joined">Date Joined:</label>
        <input type="date" id="date_joined" name="date_joined" value="<?= $employee['date_joined'] ?>" required>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street" value="<?= $employee['street'] ?>" required>

        <label for="thana">Thana:</label>
        <input type="text" id="thana" name="thana" value="<?= $employee['thana'] ?>" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= $employee['city'] ?>" required>

        <label for="district">District:</label>
        <input type="text" id="district" name="district" value="<?= $employee['district'] ?>" required>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" value="<?= $employee['salary'] ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male" <?= $employee['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $employee['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        </select>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="<?= $employee['date_of_birth'] ?>" required>

        <label for="dept_id">Department:</label>
        <input type="number" id="dept_id" name="dept_id" value="<?= $employee['dept_id'] ?>" required>

        <label for="roll">Role:</label>
        <select id="roll" name="roll" onchange="toggleRoleFields()" required>
            <option value="Doctor" <?= $employee['roll'] == 'Doctor' ? 'selected' : '' ?>>Doctor</option>
            <option value="Nurse" <?= $employee['roll'] == 'Nurse' ? 'selected' : '' ?>>Nurse</option>
            <option value="Staff" <?= $employee['roll'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
        </select>

        <!-- Doctor specific fields -->
        <div id="doctor-fields" style="display: <?= $employee['roll'] == 'Doctor' ? 'block' : 'none' ?>;">
            <label for="license_number">License Number:</label>
            <input type="text" id="license_number" name="license_number" value="<?= $employee['license_number'] ?>">

            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" value="<?= $employee['specialization'] ?>">
        </div>

        <!-- Nurse specific fields -->
        <div id="nurse-fields" style="display: <?= $employee['roll'] == 'Nurse' ? 'block' : 'none' ?>;">
            <label for="shift">Shift:</label>
            <input type="text" id="shift" name="shift" value="<?= $employee['shift'] ?>">
        </div>

        <!-- Staff specific fields -->
        <div id="staff-fields" style="display: <?= $employee['roll'] == 'Staff' ? 'block' : 'none' ?>;">
            <label for="staff_role">Staff Role:</label>
            <select name="staff_role" id="staff_role">
                <option value="Cleaner" <?= $employee['staff_role'] == 'Cleaner' ? 'selected' : '' ?>>Cleaner</option>
                <option value="Sweeper" <?= $employee['staff_role'] == 'Sweeper' ? 'selected' : '' ?>>Sweeper</option>
                <option value="Electrician" <?= $employee['staff_role'] == 'Electrician' ? 'selected' : '' ?>>Electrician</option>
                <option value="Other" <?= $employee['staff_role'] == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>

        <button type="submit">Update Employee</button>
    </form>
</body>
</html>
