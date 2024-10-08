<?php
// Include database connection settings from dbconfig.php
include 'dbconfig.php';

try {
    // Prepare and execute the SQL query to select all records from the Teachers table
    $stmt = $conn->query("SELECT * FROM Teachers");

    // Fetch all results as an associative array
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results in a readable format within <pre> tags
    echo "<pre>"; // Opening <pre> tag for formatted output
    print_r($teachers); // Output the associative array
    echo "</pre>"; // Closing </pre> tag
} catch (PDOException $e) {
    // Handle any database errors
    echo "Failed to fetch teachers. Please try again later.";
    error_log($e->getMessage()); // Log the error for debugging
}
?>

