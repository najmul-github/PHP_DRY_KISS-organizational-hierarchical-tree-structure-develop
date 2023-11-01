<?php


namespace Organogram;
require __DIR__ . '../../vendor/autoload.php';
require_once 'model.php';

class Login 
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    function login() 
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return; // System will nothing if it's not a POST request.
        }


        $email = $_POST['email'];
        $password = $_POST['password'];
        $departmentId = $_POST['department'];

        $employee = $this->authenticateEmployee($email, $password, $departmentId);

        if ($employee) {
            // Authentication succeeded
            $this->setupUserSession($employee);
    
            header('Location: ../view/hierarchy/organization.php');
            exit;
        } else {
            // Authentication failed
            echo "Authentication failed. Invalid email or password.";
        }
    }

    function authenticateEmployee($email, $password, $departmentId) 
    {
        $employee = $this->model->authenticateEmployee($email, $password, $departmentId);
    
        if ($employee && password_verify($password, $employee['password'])) {
            return $employee;
        } else {
            return null;
        }
    }

    function setupUserSession($employee) 
    {
        $_SESSION['employee_id'] = $employee['id'];
        $_SESSION['department_id'] = $employee['department_id'];
        $_SESSION['employee_name'] = $employee['name'];
        $_SESSION['role_id'] = $employee['role_id'];
        $_SESSION['role_name'] = $employee['role_name'];
    }    
    
    function isAuthenticated() 
    {
        // Check if the user is authenticated (e.g., based on session or tokens)
        // Return true if authenticated, false otherwise
        return isset($_SESSION['user_id']);
    }
    
}

$login = new Login();
$login->login();

?>