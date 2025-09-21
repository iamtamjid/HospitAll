<?php
include('../../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
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
    
    // Optional fields based on role
    $license_number = isset($_POST['license_number']) ? $_POST['license_number'] : null;
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : null;
    $shift = isset($_POST['shift']) ? $_POST['shift'] : null;
    $staff_role = isset($_POST['staff_role']) ? $_POST['staff_role'] : null;

    // Insert into the database
    $query = "INSERT INTO employees (first_name, mid_name, last_name, mobile, date_joined, street, thana, city, district, salary, gender, date_of_birth, dept_id, roll, license_number, specialization, shift, staff_role)
              VALUES ('$first_name', '$mid_name', '$last_name', '$mobile', '$date_joined', '$street', '$thana', '$city', '$district', '$salary', '$gender', '$date_of_birth', '$dept_id', '$roll', '$license_number', '$specialization', '$shift', '$staff_role')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="employee.css">
    <script>
        function showRoleFields() {
            var role = document.getElementById("roll").value;
            // Hide all additional fields initially
            document.getElementById("doctorFields").style.display = "none";
            document.getElementById("nurseFields").style.display = "none";
            document.getElementById("staffFields").style.display = "none";
            
            // Show fields based on selected role
            if (role === "Doctor") {
                document.getElementById("doctorFields").style.display = "block";
            } else if (role === "Nurse") {
                document.getElementById("nurseFields").style.display = "block";
            } else if (role === "Staff") {
                document.getElementById("staffFields").style.display = "block";
            }
        }
    </script>
</head>
<body>

    <header>
        <h1>Add New Employee</h1>
        <a href="index.php" class="btn">Back to Employees</a>
    </header>

    <form action="add_employee.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name" required>

        <label for="mid_name">Middle Name:</label>
        <input type="text" name="mid_name" id="mid_name" placeholder="Middle Name">

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" id="mobile" placeholder="Mobile" required>

        <label for="date_joined">Date Joined:</label>
        <input type="date" name="date_joined" id="date_joined" placeholder="Date Joined" required>

        <label for="street">Street:</label>
        <input type="text" name="street" id="street" placeholder="Street" required>

        <label for="thana">Thana:</label>
        <input type="text" name="thana" id="thana" placeholder="Thana" required>

        <label for="city">City:</label>
        <input type="text" name="city" id="city" placeholder="City" required>

        <label for="district">District:</label>
        <input type="text" name="district" id="district" placeholder="District" required>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" placeholder="Salary" required>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" required>

        <label for="dept_id">Department:</label>
        <select name="dept_id" id="dept_id" required>
            <option value="">Select Department</option>
            <?php
            $dept_query = "SELECT * FROM departments";
            $dept_result = mysqli_query($conn, $dept_query);
            while ($dept = mysqli_fetch_assoc($dept_result)) {
                echo "<option value='" . $dept['dept_id'] . "'>" . $dept['dept_name'] . "</option>";
            }
            ?>
        </select>

        <label for="roll">Role:</label>
        <select name="roll" id="roll" required onchange="showRoleFields()">
            <option value="">Select Role</option>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="Staff">Staff</option>
        </select>

        <!-- Doctor-specific fields -->
        <div id="doctorFields" style="display:none;">
            <label for="license_number">License Number:</label>
            <input type="text" name="license_number" id="license_number" placeholder="License Number">
            
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" id="specialization" placeholder="Specialization">
        </div>

        <!-- Nurse-specific fields -->
        <div id="nurseFields" style="display:none;">
            <label for="shift">Shift:</label>
            <input type="text" name="shift" id="shift" placeholder="Shift (Morning/Evening/Night)">
        </div>

        <!-- Staff-specific fields -->
        <label for="staff_role">Staff Role:</label>
        <div id="staffFields" style="display:none;">
            <select name="staff_role" id="staff_role">
                <option value="Cleaner">Cleaner</option>
                <option value="Sweeper">Sweeper</option>
                <option value="Electrician">Electrician</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <button type="submit" class="btn">Add Employee</button>
    </form>

</body>
</html>
