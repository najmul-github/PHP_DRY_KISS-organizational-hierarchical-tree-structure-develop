<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $departmentId = $_POST['department'];

    // Establish a database connection (replace with your actual database credentials)
    $conn = new \MySQLi('127.0.0.1', 'root', '', 'organogram_db');

    // Verify the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Corrected SQL query with placeholders for columns
    // $sql = "SELECT employee_id, employee_name, email, department_id, role_id, manager_id, password FROM Employees WHERE email = ? AND department_id = ?";
    $sql = "SELECT R.id, R.name, R.email, E.department_id, E.role_id, Ro.name AS role_name, E.manager_id, R.password
            FROM Employee_Department_Roles AS E
            LEFT JOIN Employees AS R ON E.employee_id = R.id
            LEFT JOIN Roles AS Ro ON E.role_id = Ro.id
            WHERE R.email = ? AND E.department_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Verify that the prepare statement is successful before binding parameters and executing
    if (!$stmt) {
        die('Query preparation failed: ' . mysqli_error($conn));
    }

    // Bind the variables
    $stmt->bind_param("si", $email, $departmentId);

    // Execute the query
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($employee_id, $employee_name, $email, $department_id, $role_id, $role_name, $manager_id, $hashedPassword);

    // Fetch the results
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Verify the hashed password and employee id
    if (password_verify($password, $hashedPassword) && $employee_id) {
        $_SESSION['employee_id'] = $employee_id;
        $_SESSION['department_id'] = $department_id;
        $_SESSION['employee_name'] = $employee_name;
        $_SESSION['role_id'] = $role_id;
        $_SESSION['role_name'] = $role_name;
        $_SESSION['manager_name'] = $manager_name;

        header('Location: hierarchy_tree.php'); // Replace "hierarchy_tree.php" with the desired destination
        // echo "Authentication successful. Welcome, $employee_name!";
        exit;
    } else {
        // Authentication failed, handle the error
        echo "Authentication failed. Invalid email or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
