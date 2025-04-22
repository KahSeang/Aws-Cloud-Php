<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with AI</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 0; padding: 0; }
        h2{margin-top: 20px;}
        .chatbox { width: 80%; margin: 20px auto; border: 1px solid #ccc; padding: 15px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .messages { height: 500px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; border-radius: 8px; background: #f9f9f9; display: flex; flex-direction: column; }
        .input-container { display: flex; margin-top: 10px; }
        .input-box { flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .send-btn { padding: 10px 15px; margin-left: 10px; border: none; background: #007bff; color: white; border-radius: 5px; cursor: pointer; }
        .send-btn:hover { background: #0056b3; }
        .message-container { display: flex; margin-bottom: 8px; }
        .message { padding: 8px 12px; border-radius: 15px; max-width: 70%; word-wrap: break-word; white-space: pre-line; }
        .user-message { background: #007bff; color: white; align-self: flex-end; text-align: right; }
        .ai-message { background: #e0e0e0; color: black; align-self: flex-start; text-align: left; }
    </style>
</head>
<body>
    <h2>Chat With AI</h2>
    <div class="chatbox">
        <div class="messages" id="messages"></div>
        <div class="input-container">
            <input type="text" id="userInput" class="input-box" placeholder="Type a message..." />
            <button onclick="sendMessage()" class="send-btn">Send</button>
        </div>
    </div>

    <script>
        document.getElementById("userInput").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                sendMessage();
                event.preventDefault();
            }
        });
        
        function addMessage(text, isUser) {
            let messagesDiv = document.getElementById("messages");
            let messageContainer = document.createElement("div");
            messageContainer.classList.add("message-container");
            messageContainer.style.justifyContent = isUser ? "flex-end" : "flex-start";
            
            let message = document.createElement("p");
            message.classList.add("message");
            message.classList.add(isUser ? "user-message" : "ai-message");
            message.innerHTML = `<strong>${isUser ? "You" : "AI"}:</strong> ${text.replace(/\n/g, '<br>')}`;
            
            messageContainer.appendChild(message);
            messagesDiv.appendChild(messageContainer);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
        
        function sendMessage() {
            let userInput = document.getElementById("userInput").value.trim();
            if (userInput === "") return;
            
            addMessage(userInput, true);
            document.getElementById("userInput").value = "";
            
            fetch("chatbot.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message: userInput })
            })
            .then(response => response.json())
            .then(data => {
                let formattedReply = data.reply ? data.reply.replace(/\n/g, '<br>') : data.error;
                addMessage(formattedReply, false);
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
    
    <?php include('footer.php');?>
</body>
</html>
