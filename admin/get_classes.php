<?php
// Include the database connection file
include "db.php";

// Check if the course_id parameter is set in the GET request
if (isset($_GET['course_id'])) {
    // Sanitize the input to prevent SQL injection
    $courseId = mysqli_real_escape_string($conn, $_GET['course_id']);

    // Query to get classes based on the selected course
    $sql = "SELECT * FROM class_master WHERE course_id = '$courseId'";
    
    // Execute the query
    if ($result = mysqli_query($conn, $sql)) {
        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through the result set and generate options for the class dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['class_id'] . "'>" . $row['class_name']  . "</option>";
            }
        } else {
            echo "<option value=''>No classes found</option>";
        }
    } else {
        echo "<option value=''>Error fetching classes</option>";
    }
} else {
    // Handle the case when course_id parameter is not set
    echo "<option value=''>Invalid request</option>";
}

// Close the database connection
mysqli_close($conn);
?>
