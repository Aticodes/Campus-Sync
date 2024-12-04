<?php
// Check if professorId and departmentId are set
if(isset($_POST['professorId'], $_POST['departmentId'])) {
    // Sanitize input (assuming no database connection object)
    $professorId = $_POST['professorId'];
    $departmentId = $_POST['departmentId'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "major_p";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the professor_master table
    $sql = "UPDATE professor_master SET type = 1 WHERE professor_id = '$professorId' AND d_id = '$departmentId'";

    if ($conn->query($sql) === TRUE) {
        echo "Professor's type updated successfully.";
    } else {
        echo "Error updating professor's type: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Handle if professorId or departmentId is not set
    echo "Invalid request.";
}
?>
