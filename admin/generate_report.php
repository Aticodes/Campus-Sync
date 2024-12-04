<?php
// Establish database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the WHERE clause of the SQL query
$where_clause = "WHERE 1";

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filter values
    $filters = array(
        "student_id" => $_POST['student_id'],
        "user_id" => $_POST['user_id'],
        "s_firstname" => $_POST['s_firstname'],
        "s_lastname" => $_POST['s_lastname'],
        "dob" => $_POST['dob'],
        "address1" => $_POST['address1'],
        "address2" => $_POST['address2'],
        "phone_no" => $_POST['phone_no'],
        "father_name" => $_POST['father_name'],
        "mother_name" => $_POST['mother_name'],
        "father_phone" => $_POST['father_phone'],
        "admission_date" => $_POST['admission_date'],
        "blood_group" => $_POST['blood_group'],
        "sex" => $_POST['sex'],
        "remarks" => $_POST['remarks']
        // Add more filters here following the same pattern
    );

    // Construct the WHERE clause based on provided filters
    foreach ($filters as $key => $value) {
        if (!empty($value)) {
            if ($key == 'dob' || $key == 'admission_date') {
                // For date fields, format the value appropriately
                $value = date('Y-m-d', strtotime($value));
                $where_clause .= " AND `$key` = '$value'";
            } else {
                // For other fields
                $where_clause .= " AND `$key` = '$value'";
            }
        }
    }

    // SQL query to fetch data
    $sql = "SELECT * FROM `student_master` $where_clause";

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Output data, you can customize this part based on your requirements
            echo "Student ID: " . $row["student_id"]. " - User ID: " . $row["user_id"]. "<br>";
            // Output other fields similarly
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>
