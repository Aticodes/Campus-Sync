<?php
// get_fees.php

// Include your database connection file
include "db.php";

// Get the view_department_id from the AJAX request
$viewDepartmentId = $_GET['view_department_id'];

// Replace [your_fees_query] with the actual SQL query to fetch fees based on the department_id
$feesQuery = "SELECT * FROM fees_master JOIN courses on courses.c_id = fees_master.course_id JOIN batch_master on batch_master.batch_id = fees_master.batch_id WHERE department_id = $viewDepartmentId";
$feesResult = $conn->query($feesQuery);

// Display fees in a table
echo '<table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Fees Name</th>
                <th>Batch ID</th>
                <th>Course ID</th>
                <th>Semester</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

while ($row = $feesResult->fetch_assoc()) {
    echo '<tr>
            <td>' . $row['fees_name'] . '</td>
            <td>' . $row['batch_name'] . '</td>
            <td>' . $row['c_name'] . '</td>
            <td>' . $row['sem'] . '</td>
            <td>' . $row['amount'] . '</td>
            <td>' . $row['duedate'] . '</td>
            <td>' . $row['status'] . '</td>
        </tr>';
}

echo '</tbody></table>';

// Close the database connection
$conn->close();
?>
