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

function buildHierarchyTree($employees, $managerId = null) {
  $subordinates = getSubordinates($employees, $managerId);

  if (!empty($subordinates)) {
      echo '<ul>';
      foreach ($subordinates as $employee) {
          echo '<li>';
          echo '<div>' . $employee['name'] . '</div>';
          // echo '<div> Name:' . $employee['name'] . '<br/> Role:' . $employee['role_name'] . '</div>';
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

// Display the hierarchy using HTML/CSS
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Organizational Hierarchy</title>
  <link rel="stylesheet" href="./style/hierarchyTree.css"></link>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4 text-right py-2">
        <div class="profile-menu">
          <a href="./logout.php" type="button" class="btn btn-default text-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="organizational-hierarchy">
    <div class="row">
      <div class="col-md-12">
        <div class="tree">
          <h3>Organizational Hierarchy</h3>
          <ul class="tree vertical"><li>
                <div>
                  <?php echo $_SESSION['employee_name'].' (You)'; ?>
                </div>
                <ul> 
                  <?php buildHierarchyTree($employeeList, $_SESSION['employee_id']); ?>
                </ul>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</body>

</html>