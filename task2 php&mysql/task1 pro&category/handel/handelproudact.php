<?php
include("../connaction.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "add") {
        add();
    } elseif ($_POST["submit"] == "edit") {
        edit();
    } else {
        delete();
    }
}
function add()
{
    global $conn;

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $catogery = $_POST["category_id"];
    $filename = $_FILES["file"]["name"];
    $tmpname = $_FILES["file"]["tmp_name"];

    $newfile = uniqid() . "-" . $filename;
    move_uploaded_file($tmpname, '../uplods/'.$filename);

    $query = "INSERT INTO products (name, description, image, price, category_id) VALUES ('$name', '$description', '$newfile', '$price', '$catogery')";
    mysqli_query($conn, $query);

    
    echo
    "
<script> alert('Add sucessfully'); document.location.href ='../proudacts/index.php';</script>
";
}
function edit(){
    global $conn;
    $id = intval($_GET["id"]);
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $catogery = $_POST["category_id"];
    if($_FILES["file"]["error"]!= 4){
        $filename =$_FILES["file"]["name"];
        $tmpname = $_FILES["file"]["tmp_name"];
        $newfile = uniqid() . "-" . $filename;
        move_uploaded_file($tmpname, 'uplods/'.$filename);
        $query = "UPDATE products SET image ='$newfile'WHERE id =$id" ;
        mysqli_query($conn, $query);
    }
    $query = "UPDATE products SET name ='$name' price ='$price' category_id ='$catogery' description='$description'WHERE id =$id" ;
        mysqli_query($conn, $query);
        echo
        "
    <script> alert('Edit sucessfully'); document.location.href ='../proudacts/index.php';</script>
    ";  

}
function delete(){
    global $conn;
    $id = $_POST["submit"];
    $query = "DELETE FROM products WHERE id =$id";
    mysqli_query($conn, $query);

    echo
        "
    <script> alert('Delete sucessfully'); document.location.href ='../proudacts/index.php';</script>
    ";  
}
