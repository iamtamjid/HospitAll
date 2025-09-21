<?php
// Include your common database connection file if necessary
// include('../../includes/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management Dashboard</title>
    <link rel="stylesheet" href="dashboard.css"> <!-- Include your CSS here -->
</head>
<body>

<!-- Dashboard Header -->
<header>
    <h1>Hospital Management System</h1>
    <p>Welcome to the Hospital Management System. Choose a section to manage.</p>
</header>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="management-section">
        <h2>Employee Management</h2>
        <p>Manage hospital staff including doctors, nurses, and administrators.</p>
        <a href="management/employee_management/index.php" class="btn">Go to Employee Management</a>
    </div>

    <div class="management-section">
        <h2>Resource Management</h2>
        <p>Manage hospital resources such as wards, rooms, and beds.</p>
        <a href="management/resource_allocation/index.php" class="btn">Go to Resource Management</a>
    </div>

    <div class="management-section">
        <h2>Medicine Management</h2>
        <p>Track and manage medical supplies and inventory.</p>
        <a href="management/medicine_management/index.php" class="btn">Go to Medicine Management</a>
    </div>

    <div class="management-section">
        <h2>Billing Management</h2>
        <p>Generate and manage patient bills, payments, and insurance.</p>
        <a href="management/billing/index.php" class="btn">Go to Billing Management</a>
    </div>

    <div class="management-section">
        <h2>Department Management</h2>
        <p>Manage departments like cardiology, neurology, etc., and their resources.</p>
        <a href="management/department_management/index.php" class="btn">Go to Department Management</a>
    </div>
        <div class="management-section">
        <h2>Patient Management</h2>
        <p>Manage patients and their details history.</p>
        <a href="management/patient_management/patients_management.php" class="btn">Go to Department Management</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Hospital Management System</p>
</footer>

</body>
</html>
