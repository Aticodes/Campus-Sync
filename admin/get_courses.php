<?php
// get_courses.php

// Include your database connection file
include "db.php";

// Get the department_id from the AJAX request
$departmentId = $_GET['department_id'];

// Replace [your_course_query] with the actual SQL query to fetch courses based on the department_id
$courseQuery = "select * from courses WHERE d_id = $departmentId";
$courseResult = $conn->query($courseQuery);

while ($row = $courseResult->fetch_assoc()) {
    echo '<option value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';
}

// Close the database connection
$conn->close();
?>
