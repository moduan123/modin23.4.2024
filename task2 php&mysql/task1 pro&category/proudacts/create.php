<?php include_once '../layout/header.php' ?>
<?php include '../connaction.php';?>
<div class="row ">
    <div class="col-8 mx-auto">
        <form class="border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white" method="POST" enctype="multipart/form-data" action="../handel/handelproudact.php">
            <h1 class="text-center">Create proudact</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">price</label>
                <textarea class="form-control" id="price" name="price" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id">
                    <?php
                    // Query to fetch categories
                    $sql = "SELECT id, name FROM categories";
                    $result = $conn->query($sql);

                    // Check if categories exist
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No categories found</option>";
                    }

                    // Close database connection
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control" type="file" name="file">
            </div>
            <button type="submit" name="submit" value="add" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php include_once '../layout/footer.php' ?>