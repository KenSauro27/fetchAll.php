<?php
// Database connection settings
$host = 'localhost';
$dbname = 'roles';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";

    // Fetch all teachers
    foreach ($conn->query("SELECT * FROM Teachers") as $teacher) {
        echo "ID: {$teacher['teacher_id']}, Name: {$teacher['first_name']} {$teacher['last_name']}, Email: {$teacher['email']}<br>";
    }

    // Insert a new student
    $sql = "INSERT INTO Students (first_name, last_name, date_of_birth, email, teacher_id) 
            VALUES ('Angela', 'Martin', '1996-10-01', 'angela.martin@example.com', 1)";
    $conn->exec($sql);
    echo "New student 'Angela Martin' added.<br>";
    
} catch (PDOException $e) {
    echo "Connection failed. Please try again later.";
    error_log($e->getMessage());
}
?>
