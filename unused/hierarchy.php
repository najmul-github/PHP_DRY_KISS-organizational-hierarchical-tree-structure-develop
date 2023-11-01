<?php

use Organogram\Employee;

session_start();

if (!isset($_SESSION['employee_id']) || !isset($_SESSION['department_id'])) {
    header("Location: login.php");
}

$employeeId = $_SESSION['employee_id'];
$departmentId = $_SESSION['department_id'];

require_once '../src/employee.php';

$employee = new Employee();
$employeeList = $employee->getEmployeeUnderMe($employeeId, $departmentId);


// Display the hierarchy using HTML/CSS
?>

<head>
    <title>Organizational Hierarchy</title>
    <style>
        /* Add your CSS styling here */
        ul {
            list-style-type: none;
        }
        ul li {
            padding-left: 20px;
            position: relative;
        }
        ul li:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            border-left: 1px solid #000;
            height: 100%;
        }
    </style>
</head>
<body>
    <h2>Organizational Hierarchy</h2>
    <ul>
        <?php
        // Loop through the $employeeList to display the hierarchy
        foreach ($employeeList as $employee) {
            echo '<li>' . $employee['id'] . '</li>';
            echo '<li>' . $employee['name'] . '</li>';
        }
        ?>
    </ul>
</body>
</html>

