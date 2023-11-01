<?php

use PHPUnit\Framework\TestCase;
use Organogram\Employee;

class EmployeeTest extends TestCase{
	
    public function testOrganizationalHierarchy()
    {
        // Instantiate the Employee class
        $employee = new Employee();
    
        // sample data for the organizational hierarchy
        $employeeId = 2; // valid employee ID
        $departmentId = 2; // valid department ID
    
        // Get the organizational hierarchy data
        $employeeList = $employee->getEmployeeUnderMe($employeeId, $departmentId);

        // Capture the output (HTML content) of the organizational hierarchy page
        ob_start();
        include './view/testCase.php';
        $output = ob_get_clean();
    
        // Checking if the role name is present in the page's output
        $this->assertStringContainsString('CEO B', $output);
    }
	
}