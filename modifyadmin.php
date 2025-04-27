<?php
include 'adminheader.php';
include 'adminsidebar.php';
session_start();

if (!isset($_GET['user_id'])) {
    header("Location: watchadmin.php"); 
    exit();
}
include 'db_connection.php';


$username = $email = '';
$update_message = '';

$user_id = $_GET['user_id'];
$sql = "SELECT * FROM admin WHERE admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
} else {
    echo "User not found.";
    exit();
}

$stmt->close();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update user details in the database
    $sql = "UPDATE admin SET username = ?, email = ? WHERE admin_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $user_id);

    if ($stmt->execute()) {
        $update_message = "User details updated successfully.";
        echo '<script>alert("User details updated successfully.");</script>';
    } else {
        $update_message = "Error updating user details: " . $stmt->error;
        echo '<script>alert("Error updating user details: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 15px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Modify User</h2>
        <?php if(isset($update_message)) { ?>
            <div class="message"><?php echo $update_message; ?></div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?user_id=" . $user_id); ?>" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
