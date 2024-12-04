<?php
// fetch_chat.php

// Assuming you have a database connection established already
include "db.php";
session_start();
// Check if chat ID is received through POST
if(isset($_POST['chatId'])) {
    // Sanitize the input to prevent SQL injection
    $chatId = mysqli_real_escape_string($conn, $_POST['chatId']);

    // Fetch chat messages from the database based on the selected chat ID
    $sql = "SELECT * FROM `query_master` WHERE `query_to` = 1 AND `query_from` = $chatId";
    $result = mysqli_query($conn, $sql);

    // Check if there are any messages
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['q_to'] = $chatId;
        // Loop through the fetched messages and generate HTML markup
        while($row = mysqli_fetch_assoc($result)) {
            // Generate HTML markup for each message and response
            echo '<div class="bubble you">' . $row['message'] . '</div>';
            if ($row['status'] != 0) {
                echo '<div class="bubble me">' . $row['answer'] . '</div>';
            }
        }
    } else {
        // If there are no messages, create a response indicating that
        echo '<div class="no-messages">No messages found</div>';
    }
} else {
    // If chat ID is not received, create an error response
    echo '<div class="error">Chat ID not provided</div>';
}
?>
