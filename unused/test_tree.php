<?php
use Organogram\Employee;
require_once '../src/employee.php';

session_start();

if (!isset($_SESSION['employee_id']) || !isset($_SESSION['department_id'])) {
    header("Location: login.php");
}

$employeeId = $_SESSION['employee_id'];
$departmentId = $_SESSION['department_id'];

$employee = new Employee();
$employeeData = $employee->getEmployeeUnderMe($employeeId, $departmentId);
// 
// function buildHierarchyTree($employees) {
//     $employeeId=$employees[0]['id'];
//     $tree = array();

//     foreach ($employees as $employee) {
//         if ($employee['manager_id'] == $employeeId) {
//             // $subordinates = buildHierarchyTree($employees,$employee['role_id']);
//             // if (!empty($subordinates)) {
//                 $employee['subordinates'] = $employee;
//             // }
//             $tree[] = $employee;
//         }else{
//             $employeeId = $employee['id'];
//         }
//     }

//     return $tree;
// }
// 
function buildHierarchyTree($employees, $managerId = null) {
    $subordinates = getSubordinates($employees, $managerId);

    if (!empty($subordinates)) {
        echo '<ul>';
        foreach ($subordinates as $employee) {
            echo '<li>';
            echo '<div>' . $employee['name'] . '</div>';
            buildHierarchyTree($employees, $employee['id']);
            echo '</li>';
        }
        echo '</ul>';
    }
}

function getSubordinates($employees, $managerId) {
    $subordinates = [];
    foreach ($employees as $employee) {
        if ($employee['manager_id'] == $managerId) {
            $subordinates[] = $employee;
        }
    }
    return $subordinates;
}

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '  <meta charset="UTF-8">';
echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '  <title>Organizational Hierarchy</title>';
echo '</head>';
echo '<body>';
echo '  <div>';
echo '    <h3>Organizational Hierarchy</h3>';
echo '    <div id="organogram">';
buildHierarchyTree($employeeData, $_SESSION['employee_id']);
echo '    </div>';
echo '  </div>';
echo '</body>';
echo '</html>';
?>
