<?php include_once '../layout/header.php' ?>
<?php include '../connaction.php';?>
<div class="row ">
    <div class="col-8 mx-auto">
        <form class="border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white" method="POST" enctype="multipart/form-data" action="../handel/handelcategory.php">
            <h1 class="text-center">Create proudact</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" name="submit" value="add" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php include_once '../layout/footer.php' ?>