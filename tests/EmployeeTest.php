<?php

use PHPUnit\Framework\TestCase;
use Organogram\Employee;

class EmployeeTest extends TestCase{
	
    public function testOrganizationalHierarchy()
    {
        // Instantiate the Employee class
        $employee = new Employee();
    
        // Define sample data for the organizational hierarchy
        $employeeId = 2; // Replace with a valid employee ID
        $departmentId = 2; // Replace with a valid department ID
    
        // Get the organizational hierarchy data
        $employeeList = $employee->getEmployeeUnderMe($employeeId, $departmentId);

        // Capture the output (HTML content) of the organizational hierarchy page
        ob_start();
        include './view/testCase.php'; // Replace with the actual path to your hierarchy page
        $output = ob_get_clean();
    
        // Check if the role name is present in the page's output
        $this->assertStringContainsString('CEO B', $output); // Replace 'Name' with an actual role name in your data
    }
	
}