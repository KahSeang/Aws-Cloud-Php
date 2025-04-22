<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Details</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            body {
                background-image: url('Websystemphp/10.webp');
                background-size: cover;
                background-position: center;
            }

            .container {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                max-width: 1200px;
                margin: 20px auto;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .side-images {
                width: 30%;
                padding: 20px;
                box-sizing: border-box;
            }

            .side-images img {
                display: block;
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 5px;
                margin-bottom: 10px;
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            .side-images img:hover {
                transform: scale(1.05);
            }

            .event-details {
                width: 65%;
                padding: 20px;
                box-sizing: border-box;
            }

            .event-details h2 {
                font-size: 24px;
                color: #333;
                margin: 0 0 10px;
            }

            .event-details img {
                width: 100%;
                height: 300px;
                object-fit: cover;
                border-radius: 5px;
                margin-bottom: 20px;
                transition: transform 0.3s ease;
            }

            .event-details img:hover {
                transform: scale(1.05);
            }

            .event-details p {
                font-size: 16px;
                color: #666;
                margin: 10px 0;
                spacing: 20px;
            }

            #map {
                height: 400px;
                width: 100%;
            }

            .action-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }
            .action-buttons button {
                border: none;
                outline: none;
                cursor: pointer;
                transition: background-color 0.3s;
                padding: 10px; /* This adds more space around the icon */
                margin: 0 10px; /* This adds space between the buttons */
            }

            .action-buttons button:hover {
                background-color: #333; /* Darken the button on hover for a visual effect */
            }

            .favorite-button {
                background-color: red;
                color: #fff;
            }

            .cart-button {
                background-color: #4caf50;
                color: #fff;
            }

            .submit-button {
                background-color: #007bff;
                color: #fff;
            }

            .action-buttons i.fa {
                font-size: 24px; /* Adjust to a reasonable size */
            }
            h2{
                font-family: 'Open Sans', sans-serif;

            }
            strong{
                font-family: 'Open Sans', sans-serif;

            }

            #mainImage{
                height: 500px;
            }
        </style>
    </head>
    <body>

        <?php include('header.php'); ?>

        <div class="container">
            <div class="side-images">
                <?php
                include 'db_connection.php';

                if (isset($_GET['event_id'])) {
                $event_id = $_GET['event_id'];

                $sql_side = "SELECT event_imgside1, event_imgside2, event_imgside3, event_imgside4, event_imgside5 FROM event WHERE event_id = $event_id";
                $result_side = mysqli_query($conn, $sql_side);
                $row_side = mysqli_fetch_assoc($result_side);

                for ($i = 1;
                $i <= 5;
                $i++) {
                $image_url = $row_side['event_imgside' . $i];
                if (!empty($image_url)) {
                echo '<img src="' . $image_url . '" alt="Side Image ' . $i . '" style="height:160px;width:280px;margin-left:50px;" onmouseover="changeMainImage(\'' . $image_url . '\')" onmouseout="resetMainImage()">';
                }
                }
                }
                ?>
            </div>

            <div class="event-details">
                <?php
                if (isset($_GET['event_id'])) {
                    $event_id = $_GET['event_id'];

                    $sql_event = "SELECT * FROM event WHERE event_id = $event_id";
                    $result_event = mysqli_query($conn, $sql_event);

                    if (mysqli_num_rows($result_event) > 0) {
                        $row_event = mysqli_fetch_assoc($result_event);
                        echo '<h2>' . $row_event['event_name'] . '</h2>';
                        echo '<img src="' . $row_event['event_img'] . '" alt="' . $row_event['event_name'] . '" id="mainImage">';
                        echo '<p style="font-size: 26px;"><strong>Type:</strong> ' . $row_event['type_name'] . '</p>';
                        echo '<p style="font-size: 22px;"><strong>RM </strong> ' . $row_event['event_price'] . '</p>';
                        echo '<p style="font-size: 18px;"><strong>Description:</strong> ' . $row_event['event_description'] . '</p>';
                        echo '<p style="font-size: 25px;"><strong>Available:</strong> <span style="color: ' . ($row_event['event_available'] <= 0 ? 'red' : 'green') . ';">' . $row_event['event_available'] . '</span></p>';
                    }
                }
                ?>
                <div class="action-buttons">
                    <form method="post" action="event_detail.php?event_id=<?php echo $event_id; ?>">
                        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                        <button type="submit" name="add_to_favorites" class="favorite-button">
                            <i class="fas fa-heart fa-3x"></i> 
                        </button>
                    </form>
                    <?php
                    include 'db_connection.php';

                    if (isset($_POST['add_to_favorites'])) {
                        $userId = $_SESSION['user_id'] ?? 0;
                        if ($userId > 0) {
                            $eventId = $_POST['event_id'] ?? 0;

                            $stmt = $conn->prepare("SELECT * FROM favorites WHERE user_id = ? AND event_id = ?");
                            $stmt->bind_param("ii", $userId, $eventId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows == 0) {
                                $insertStmt = $conn->prepare("INSERT INTO favorites (user_id, event_id) VALUES (?, ?)");
                                $insertStmt->bind_param("ii", $userId, $eventId);
                                $insertStmt->execute();
                                $insertStmt->close();
                                echo "<script>alert('Item added to favorites successfully');</script>";
                            } else {
                                echo "<script>alert('Item is already in favorites');</script>";
                            }
                        } else {
                            echo "<script>alert('You must be logged in to add events to favorites');</script>";
                        }
                    }
                    ?>

                    <?php
                    include 'db_connection.php';

                    if (isset($_POST['add_to_cart'])) {
                        $userId = $_SESSION['user_id'] ?? 0;
                        if ($userId > 0) {
                            $eventId = $_POST['event_id'] ?? 0;
                            $quantity = 1;

                            $stmt = $conn->prepare("SELECT quantity FROM cart WHERE user_id = ? AND event_id = ?");
                            $stmt->bind_param("ii", $userId, $eventId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $newQuantity = $row['quantity'] + $quantity;
                                $updateStmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND event_id = ?");
                                $updateStmt->bind_param("iii", $newQuantity, $userId, $eventId);
                                $updateStmt->execute();
                                $updateStmt->close();
                            } else {
                                $insertStmt = $conn->prepare("INSERT INTO cart (user_id, event_id, quantity) VALUES (?, ?, ?)");
                                $insertStmt->bind_param("iii", $userId, $eventId, $quantity);
                                $insertStmt->execute();
                                $insertStmt->close();
                            }
                            echo "<script>alert('Item added to cart successfully');</script>";
                        } else {
                            echo "<script>alert('You must be logged in to add items to the cart');</script>";
                        }
                    }
                    ?>



                    <form method="post" action="event_detail.php?event_id=<?php echo $event_id; ?>">
                        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">

                        <button type="submit" name="add_to_cart" class="cart-button">
                            <i class="fas fa-shopping-cart fa-3x"></i>
                        </button>



                    </form>


                </div>
            </div>
        </div>

<?php include('footer.php'); ?>

        <script>
            function changeMainImage(imageSrc) {
                document.getElementById('mainImage').src = imageSrc;
            }

            function resetMainImage() {
                // Reset to the main image when mouseout
                document.getElementById('mainImage').src = '<?php echo $row_event['event_img']; ?>';
            }
        </script>

        <!-- Google Maps JavaScript API script -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdz0-crQ6pS8SR7-LLDGhvnQojkzcKnX0&callback=initMap"></script>

    </body>
</html>