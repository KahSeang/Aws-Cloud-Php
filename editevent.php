<?php include 'adminheader.php'; ?>
<?php include 'adminsidebar.php'; ?>

<style>
    /* Add this style to make description and location cells longer */
    .description-cell,
    .location-cell {
        max-width: 1000px; /* Adjust the max-width as needed */
        word-wrap: break-word; /* Ensure long text wraps within the cell */
    }
</style>

<div class="content">
    <div class="container-fluid">
        <h2>Products Management</h2>
        <a href="add_event.php" class="btn btn-primary mb-3">Add Products</a>

        <?php
        include 'db_connection.php';

        // Query to select all events and their details
        $query = "SELECT * FROM event";

        // Execute query
        $result = mysqli_query($conn, $query);

        // Check if there are any events
        if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Product ID</th>
                        <th>Category ID</th>
                        <th>Type Name</th>
                        <th style="height: 30px;">Description</th>
                        <th>Available</th>
                        <th>Main Image</th> 
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Image 4</th>
                        <th>Image 5</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Hover</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <a href="modifyevent.php?id=<?php echo $row['event_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="deleteevent.php?id=<?php echo $row['event_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <td><?php echo $row['event_id']; ?></td>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td class="description-cell" ><?php echo $row['event_description']; ?></td>
                        <td><?php echo $row['event_available']; ?></td>
                        <td><img src="<?php echo $row['event_img']; ?>" alt="Main Image" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><img src="<?php echo $row['event_imgside1']; ?>" alt="Image 1" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><img src="<?php echo $row['event_imgside2']; ?>" alt="Image 2" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><img src="<?php echo $row['event_imgside3']; ?>" alt="Image 3" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><img src="<?php echo $row['event_imgside4']; ?>" alt="Image 4" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><img src="<?php echo $row['event_imgside5']; ?>" alt="Image 5" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td><?php echo $row['event_name']; ?></td>
                        <td><?php echo $row['event_price']; ?></td>
                        <td><img src="<?php echo $row['event_hover']; ?>" alt="Event Hover" style="width: 100px; height: 100px; object-fit: cover;"></td>
                        <td>


                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        } else {
            echo "No events found.";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</div>

<?php include 'admin_footer.php'; ?>
