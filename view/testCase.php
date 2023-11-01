<?php

use Organogram\Employee;

$employee = new Employee();
$employeeList = $employee->getEmployee(2);

print_r($employeeList[0]['name']);

?>