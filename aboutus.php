<?php
session_start();
require_once 'session_check.php';
include 'db_connection.php'; // Include the database connection file
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>About Us</title>
        <style>
            * {
                font-family: Nunito, sans-serif;
                box-sizing: border-box;
            }

            body {
                background-image: url('Websystemphp/10.webp');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                margin: 0;
                padding: 0;
                color: #333;
            }

            body::before {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.3);
                z-index: -1;
            }

            .fade-in {
                animation: fadeIn 1s ease-in-out forwards;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            .responsive-container-block {
                min-height: 75px;
                height: fit-content;
                width: 100%;
                padding: 10px;
                display: flex;
                flex-wrap: wrap;
                margin: 0 auto;
                justify-content: flex-start;
            }

            .responsive-container-block.bigContainer {
                padding: 10px 20px;
                margin: 0 auto;
            }

            .responsive-container-block.Container {
                max-width: 1320px;
                align-items: center;
                justify-content: center;
                margin: 80px auto;
            }

            .responsive-container-block.leftSide {
                width: auto;
                align-items: flex-start;
                padding: 10px 0;
                flex-direction: column;
                margin: 0 auto;
                max-width: 300px;
            }

            .text-blk.heading {
                font-size: 40px;
                line-height: 64px;
                font-weight: 900;
                color: white;
                margin: 0;
                text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            }

            .text-blk.subHeading {
                font-size: 18px;
                line-height: 25px;
                margin: 0;
                color: white;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            }

            .responsive-container-block.rightSide {
                width: 675px;
                position: relative;
                display: flex;
                height: 700px;
                min-height: auto;
            }

            .number1img,
            .number2img,
            .number3img,
            .number4img,
            .number5img,
            .number6img,
            .number7img {
                position: absolute;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                transition: transform 0.3s ease;
            }

            .number1img:hover,
            .number2img:hover,
            .number3img:hover,
            .number4img:hover,
            .number5img:hover,
            .number6img:hover,
            .number7img:hover {
                transform: scale(1.05);
                z-index: 10;
            }

            .number1img {
                margin: 39% 80% 29% 0;
                width: 20%;
                height: 32%;
            }

            .number2img {
                margin: 19% 42% 42% 23%;
                width: 35%;
                height: 39%;
            }

            .number3img {
                margin: 62% 64% 30% 23%;
                width: 13%;
                height: 21%;
            }

            .number4img {
                margin: 62% 27% 0 39%;
                width: 34%;
                height: 33%;
            }

            .number5img {
                margin: 38% 27% 41% 60%;
                width: 13%;
                height: 21%;
            }

            .number6img {
                margin: 0 3% 67% 62%;
                width: 35%;
                height: 33%;
            }

            .number7img {
                margin: 40% 0 18% 75%;
                width: 25%;
                height: 42%;
            }

            .container {
                max-width: 1200px;
                margin: auto;
                overflow: hidden;
                padding: 0 20px;
            }

            .section {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                margin-bottom: 40px;
                padding: 20px;
                background: rgba(255,255,255,0.85);
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.3s ease;
            }

            .section:nth-child(even) .section-content {
                order: 2;
            }

            .section:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            }

            .section .section-image {
                border-radius: 8px;
                object-fit: cover;
                width: 1000px;
                height: 500%;
                border-radius: 10px;
                transition: transform 0.5s ease;
            }

            .section:hover .section-image {
                transform: scale(1.03);
            }

            .section-content {
                flex: 1;
                max-width: 65%;
                padding: 20px;
            }

            .section h2 {
                margin-top: 0;
                font-size: 24px;
                color: #2c3e50;
                position: relative;
                padding-bottom: 10px;
            }

            .section h2:after {
                content: '';
                position: absolute;
                width: 50px;
                height: 3px;
                background: linear-gradient(90deg, #3498db, #9b59b6);
                bottom: 0;
                left: 0;
            }

            .section p {
                color: #555;
                line-height: 1.6;
            }

            .google-map-container {
                position: relative;
                overflow: hidden;
                padding-top: 30%;
                margin-bottom: 50px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }

            .google-map-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: none;
            }

            /* Team Section Styles */
            .team-section {
                max-width: 1200px;
                margin: 80px auto;
                padding: 40px 20px;
                background: linear-gradient(135deg, rgba(249,249,249,0.9) 0%, rgba(255,255,255,0.9) 100%);
                border-radius: 16px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            }

            .team-header {
                text-align: center;
                margin-bottom: 50px;
            }

            .team-title {
                font-size: 2.5rem;
                color: #2c3e50;
                margin-bottom: 15px;
                position: relative;
                display: inline-block;
            }

            .team-title:after {
                content: '';
                position: absolute;
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, #3498db, #9b59b6);
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
            }

            .team-subtitle {
                font-size: 1.1rem;
                color: #7f8c8d;
                max-width: 700px;
                margin: 0 auto;
                line-height: 1.6;
            }

            .team-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 30px;
                padding: 20px;
            }

            .member-card {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                position: relative;
                height: 100%;
            }

            .member-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            .member-photo-container {
                position: relative;
                height: 280px;
                overflow: hidden;
            }

            .member-photo {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .photo-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.7));
                opacity: 0.8;
            }

            .member-card:hover .member-photo {
                transform: scale(1.05);
            }

            .member-info {
                padding: 20px;
                text-align: center;
                position: relative;
                z-index: 1;
            }

            .member-name {
                font-size: 1.3rem;
                color: #2c3e50;
                margin-bottom: 5px;
                font-weight: 600;
            }

            .member-role {
                color: #7f8c8d;
                font-size: 0.95rem;
                line-height: 1.5;
            }

            .no-members {
                text-align: center;
                grid-column: 1/-1;
                color: #7f8c8d;
                font-style: italic;
            }

            @media (max-width: 1024px) {
                .responsive-container-block.Container {
                    flex-direction: column-reverse;
                }

                .text-blk.heading {
                    text-align: center;
                    max-width: 400px;
                }

                .text-blk.subHeading {
                    text-align: justify;
                }

                .responsive-container-block.leftSide {
                    align-items: center;
                    max-width: 480px;
                }

                .responsive-container-block.rightSide {
                    margin: 0 auto 70px auto;
                }
                
                .team-grid {
                    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                }
                
                .section-content {
                    max-width: 100%;
                }
            }

            @media (max-width: 768px) {
                .responsive-container-block.rightSide {
                    width: 450px;
                    height: 450px;
                }

                .responsive-container-block.leftSide {
                    max-width: 450px;
                }

                .section .section-image,
                .section .section-content {
                    width: 100%;
                    max-width: 100%;
                    margin-right: 0;
                    margin-bottom: 20px;
                }
                
                .team-section {
                    padding: 30px 15px;
                }
                
                .team-title {
                    font-size: 2rem;
                }
                
                .team-grid {
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 20px;
                }
                
                .member-photo-container {
                    height: 240px;
                }
            }

            @media (max-width: 500px) {
                .number1img,
                .number2img,
                .number3img,
                .number4img,
                .number5img,
                .number6img,
                .number7img {
                    display: none;
                }

                .responsive-container-block.rightSide {
                    width: 100%;
                    height: 250px;
                    margin: 0 auto 100px auto;
                }

                .text-blk.heading {
                    font-size: 25px;
                    line-height: 40px;
                    max-width: 400px;
                }

                .text-blk.subHeading {
                    font-size: 14px;
                    line-height: 25px;
                    text-align: justify;
                }

                .responsive-container-block.leftSide {
                    width: 100%;
                }
                
                .team-grid {
                    grid-template-columns: 1fr;
                }
                
                .member-photo-container {
                    height: 300px;
                }
            }
        </style>
    </head>

    <body>
        <?php include('header.php'); ?>

        <?php
        include('db_connection.php');

        $query = "SELECT img_1, img_2, img_3, img_4, img_5, img_6 FROM aboutus WHERE id = 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $image1 = $row['img_1'];
            $image2 = $row['img_2'];
            $image3 = $row['img_3'];
            $image4 = $row['img_4'];
            $image5 = $row['img_5'];
            $image6 = $row['img_6'];
        } else {
            $image1 = 'default_image1.jpg';
            $image2 = 'default_image2.jpg';
            $image3 = 'default_image3.jpg';
            $image4 = 'default_image4.jpg';
            $image5 = 'default_image5.jpg';
            $image6 = 'default_image6.jpg';
        }
        ?>

        <div class="responsive-container-block bigContainer fade-in">
            <div class="responsive-container-block Container">
                <div class="responsive-container-block leftSide">
                    <?php
                    $sql = "SELECT * FROM aboutus";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        if ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <p class="text-blk heading"><?php echo $row['h1']; ?></p>
                            <p class="text-blk subHeading" style="text-align: justify;"><?php echo $row['descr']; ?> 
                                
                            </p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="responsive-container-block rightSide">
                    <img class="number1img" src="<?php echo $image1; ?>">
                    <img class="number2img" src="<?php echo $image2; ?>">
                    <img class="number3img" src="<?php echo $image3; ?>">
                    <img class="number5img" src="<?php echo $image4; ?>">
                    <img class="number4img" src="<?php echo $image5; ?>">
                    <img class="number7img" src="<?php echo $image6; ?>">
                </div>
            </div>
        </div>

        <!-- Enhanced Team Section -->
        <div class="team-section fade-in">
            <div class="team-header">
                <h2 class="team-title">Why Choose Us</h2>
                <p class="team-subtitle">OK Hub offers high-quality graduation essentials, personalized gifts, and affordable prices. With fast, reliable service, we ensure a seamless and memorable celebration.</p>
            </div>
            
            <div class="team-grid">
                <?php
                include('db_connection.php');
                $query = "SELECT * FROM employee";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="team-member">';
                        echo '  <div class="member-card">';
                        echo '    <div class="member-photo-container">';
                        echo '      <img src="uploads/' . htmlspecialchars($row['emp_photo']) . '" alt="' . htmlspecialchars($row['name']) . '" class="member-photo">';
                        echo '      <div class="photo-overlay"></div>';
                        echo '    </div>';
                        echo '    <div class="member-info">';
                        echo '      <h3 class="member-name">' . htmlspecialchars($row['name']) . '</h3>';
                        echo '      <p class="member-role">' . htmlspecialchars($row['description']) . '</p>';
                        echo '    </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-members">No team members found</p>';
                }
                ?>
            </div>
        </div>

        <?php
        include 'db_connection.php';

        $sql = "SELECT * FROM aboutus";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="container fade-in">';
                echo '    <div class="section elevate-moments">';
                echo '        <img src="' . $row["moment1_img"] . '" alt="Elevate Moments" class="section-image">';
                echo '        <div class="section-content">';
                echo '            <h2>Graduation Milestones</h2>';
                echo '            <p>' . $row['momentdesc1'] . '</p>';
                echo '        </div>';
                echo '    </div>';

                echo '    <div class="section create-beauty">';
                echo '        <img src="' . $row["moment2_img"] . '" alt="Plan Your Graduation" class="section-image">';
                echo '        <div class="section-content">';
                echo '            <h2>Plan Your Graduation</h2>';
                echo '            <p>' . $row['momentdesc2'] . '</p>';
                echo '        </div>';
                echo '    </div>';

                echo '    <div class="section facilitate-connection">';
                echo '        <img src="' . $row["moment3_img"] . '" alt="Stay Connected" class="section-image">';
                echo '        <div class="section-content">';
                echo '            <h2>Stay Connected</h2>';
                echo '            <p>' . $row['momentdesc3'] . '</p>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        }
        ?>

        <?php include('footer.php'); ?>
    </body>
</html>