<?php

use Organogram\Employee;
require_once 'functions.php';

session_start();

if (!isset($_SESSION['employee_id']) || !isset($_SESSION['department_id'])) {
    header("Location: login.php");
}

$employeeId = $_SESSION['employee_id'];
$departmentId = $_SESSION['department_id'];

require_once '../../src/employee.php';

$employee = new Employee();
$employeeList = $employee->getEmployeeUnderMe($employeeId, $departmentId);

require 'index.php';
