<?php
/**
 * Model - All kind of database query and fetching result.  
 *
 *
 * PHP version 7.3
 *
 *
 * @category   CategoryName
 * @package    Organogram
 * @author     Sarwar Hossain <sarwar@instabd.com>
 * @copyright  2020 Intalogic Bangaldesh
 * @version    1.0.1
 */
namespace Organogram;

require __DIR__ . '../../vendor/autoload.php';
require_once 'database.php';

// Include the configration file 
include_once 'config.php';


/**
 * Model Class Statically use to all over the system.
 * Usage: \Model::get()->
 * 
 */
class Model{

    /**
     * @var MySQLi Object  
     */
    private $db;

    /**
     * Constructor 
     */

    public function __construct()
    {
        $this->db = new Database();
    }
    
    /**
     * Static method get the Model Object 
     * @return \Organogram\Model
     */
    public static function get() {
        return new Model();
    }

    /**
     * Query : Execute the base query 
     * @param String $sql
     * @return mixed 
     */
    // private function query($sql){
    public function query($sql){
        return $this->db->query($sql);
    }
    
    /**
     * fetch : get the first result 
     * @param mixed $result
     * @return Array
     */
    private function fetch($result){
        $data = $result->fetch_assoc();
        $result->free_result();
        $this->db->close();
        return $data; 

    }
    /**
     * fetchAll : get the full result of query
     * @param type $result
     * @return type
     */
    private function fetchAll($result){        
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $this->db->close();
        return $data; 
    }

    /**
     * employee: get the employee data
     * @param type $id
     * @return type
     */
    public function employees($id = false){
        $where = $id ? "WHERE id='{$id}'" : "";
        $sql = "SELECT * FROM employees {$where}";

        $result = $this->db->query($sql);

        if ($result === false) {
            die("Database Error: " . mysqli_error($this->db));
        }

        $data = $this->db->fetchAll($result);
        $this->db->close();

        return $data;
    }

    /**
     * Get the information of an employee in the specified department.
     *
     * @param Integer $employeeId
     * @param Integer $departmentId
     * @return Array Employee information
    */
    function getEmployeeInfo($employeeId, $departmentId) {
        // Query to get the employee's information in the specified department.
        $sql = "SELECT R.id, E.employee_name, E.department_id, E.role_id, E.manager_id, R.name AS manager_name
                FROM Employee_Department_Roles AS E
                LEFT JOIN Employees AS R ON E.manager_id = R.id
                WHERE E.department_id = $departmentId AND E.employee_id = $employeeId";
                
        $result = Model::get()->query($sql);
        return $result->fetch_assoc();
    }
    /**
     * ToDo:: // do something
     */
    public function roles(){
        // Query to get the role's information.
        $sql = "SELECT 'id', 'name' FROM Roles";
                
        $result = Model::get()->query($sql);
        return $result->fetch_assoc();
    }
    
    /**
     * ToDo:: // do something
     */

    public function departments(){
        // Query to get the department's information.
        $sql = "SELECT * FROM departments";
                
        $result = Model::get()->query($sql);
        var_dump($result->fetch_assoc());
        return $result->fetch_assoc();
    }
    
    /**
     * ToDo:: // do something
     */

    public function employeeUnderMe($employeeId, $departmentId){
        $employeeList = [];
        $this->buildEmployeeTree($employeeList, $employeeId, $departmentId);
        return $employeeList;
    }

    /**
     * Recursive function to build a hierarchical tree of employees.
     *
     * @param array $employeeList - Array to store the hierarchical tree.
     * @param integer $employeeId - ID of the employee (manager).
     * @param integer $departmentId - ID of the department.
     */
    function buildEmployeeTree(&$employeeList, $employeeId, $departmentId) 
    {
        // Fetch employee data for the specified department and role from Employee_Department_Roles.
        $sql = "SELECT R.id, R.name AS manager_name, E.department_id, E.role_id, E.manager_id, R.name,  Ro.name AS role_name
                FROM Employee_Department_Roles AS E
                LEFT JOIN Employees AS R ON E.employee_id = R.id
                LEFT JOIN Roles AS Ro ON E.role_id = Ro.id
                WHERE E.department_id = $departmentId AND E.manager_id = $employeeId";
                
        $result = Model::get()->query($sql);
    
        while ($row = $result->fetch_assoc()) {
            // Added the current employee to the list.
            $employeeList[] = $row;
    
            // Recursively call the function to find subordinates.
            $this->buildEmployeeTree($employeeList, $row['id'], $departmentId);
        }
    }

    function authenticateEmployee($email, $password, $departmentId) 
    {
        $sql = "SELECT R.id, R.name, R.email, E.department_id, E.role_id, Ro.name AS role_name, E.manager_id, R.password
                FROM Employee_Department_Roles AS E
                LEFT JOIN Employees AS R ON E.employee_id = R.id
                LEFT JOIN Roles AS Ro ON E.role_id = Ro.id
                WHERE R.email = '$email' AND E.department_id = $departmentId";
    
        $result = Model::get()->query($sql);
        return $result->fetch_assoc();
    }


}


