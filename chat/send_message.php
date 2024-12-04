<?php
// Include your database connection file
include "db.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve chat ID and message from the POST data
    $chatId = $_POST["chat_id"];
    $message = $_POST["message"];

    // Sanitize inputs to prevent SQL injection
    $chatId = mysqli_real_escape_string($conn, $chatId);
    $message = mysqli_real_escape_string($conn, $message);

    // Fetch the last message for the specified chat ID
    $fetchQuery = "SELECT * FROM query_master WHERE query_from = '$chatId' ORDER BY query_id DESC LIMIT 1";
    $result = mysqli_query($conn, $fetchQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // If there's a last message, update it with the new message
        $row = mysqli_fetch_assoc($result);
        $messageId = $row['query_id'];
        if($row['status']==0){
        $updateQuery = "UPDATE query_master SET answer = '$message', status = '1' WHERE query_id = '$messageId'"; 
    }
    else{
        $updateQuery = "INSERT INTO query_master (query_to ,query_from, answer) VALUES ('1','$chatId', '$message')";
    }
        if (mysqli_query($conn, $updateQuery)) {
            // Message updated successfully
          
        } else {
            // Error occurred while updating message
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // If there's no last message, insert the new message as a new record
        $insertQuery = "INSERT INTO query_master (query_id, answer) VALUES ('$chatId', '$message')";
        if (mysqli_query($conn, $insertQuery)) {
            // Message inserted successfully
            echo "Message sent successfully!";
        } else {
            // Error occurred while inserting message
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    // If the form was not submitted via POST method, redirect or handle accordingly
    echo "Invalid request!";
}
?>
