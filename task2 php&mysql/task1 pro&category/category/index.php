<?php include_once '../layout/header.php' ?>
<?php require '../handel/handelproudact.php' ?>
<div class="row ">
    <a href="create.php" class="btn btn-info">create</a>
    <div class="col-8 mx-auto">
        <table class="table border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prodact = mysqli_query($conn, "SELECT * FROM categories");
                $i = 1;
                foreach ($prodact as $pro) : ?>
                    <tr>
                        <th scope="row"><?= $pro['id'] ?></th>
                        <td><?= $pro['name'] ?></td>
                    
                    <td>

                            <a href="edit.php?id=<?= $pro['id']; ?>" class="btn btn-info">Edit</a>
                            <form class="d-inline" action="../handel/handelcategory.php" method="post">
                                <button type="submit" name="submit" value="<?php echo $pro['id']; ?>" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once '../layout/footer.php' ?>