<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="conversation-start">
        <span>Today, 6:48 AM</span>
    </div>
    <div id="chat-container">
        <!-- Chat messages will be appended here -->
    </div>

    <div class="write">
        <a href="javascript:;" class="write-link attach"></a>
        <input type="text" id="message-input" placeholder="Type your message here" />
        <a href="javascript:;" class="write-link smiley"></a>
        <a href="javascript:;" class="write-link send" id="send-message">Send</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Function to fetch chat messages
            function fetchChat(chatId) {
                $.ajax({
                    url: 'fetch_chat.php', // URL to your PHP script that fetches chat messages
                    method: 'POST',
                    data: { chatId: chatId }, // Send the selected chat ID to the server
                    success: function(response) {
                        $('#chat-container').append(response); // Append the fetched chat bubbles after the chat-container
                    }
                });
            }

            // Load chat messages when the page loads
            fetchChat(); // Pass appropriate chat ID if needed

            // Function to send message
            $('#send-message').click(function(){
                var message = $('#message-input').val();
                $.ajax({
                    url: 'send_message.php', // URL to your PHP script that sends a message
                    method: 'POST',
                    data: {message: message},
                    success: function(response) {
                        $('#message-input').val('');
                        fetchChat(); // Reload chat messages after sending a message
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php
                                $to = $row['query_from'];
                                $sql = "SELECT * FROM `query_master` WHERE query_to = 1 AND query_from = $to ;";
                                $ress = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($ress)) {
                                ?>




                                    <div class="bubble you">
                                        <?php echo $rows['message']; ?>
                                    </div>
                                    <?php if ($rows['status'] == 0) {
                                    } else {
                                    ?>
                                        <div class="bubble me">
                                            <?php echo $rows['answer']; ?>
                                        </div>
                                    <?php
                                    } ?>

                                <?php
                                } ?>