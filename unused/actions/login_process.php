<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $departmentId = $_POST['department'];

    // Check user authentication - Implement your authentication logic here

    // For example, if you have a 'users' table in your database:
    // Replace 'your_db_host', 'your_db_user', 'your_db_password', and 'your_db_name' with your database credentials.
    // $conn = new mysqli('your_db_host', 'your_db_user', 'your_db_password', 'your_db_name');
    $conn = new \MySQLi(env('DB_HOST', 'localhost'), env('DB_USER', 'dbuser'), env('DB_PASSWORD', 'password'), env('DB_NAME', 'dbname'));
        
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, password FROM employees WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashedPassword);

    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        // Successful login - Set user session variables and redirect
        $_SESSION['user_id'] = $id;
        $_SESSION['department_id'] = $departmentId;
        header("Location: view/hierarchy.php");
    } else {
        // Invalid login
        header("Location: view/login.php");
    }

    $stmt->close();
    $conn->close();
}
?>
