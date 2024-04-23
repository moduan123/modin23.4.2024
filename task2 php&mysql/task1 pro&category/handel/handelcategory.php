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

    $query = "INSERT INTO categories VALUES('','$name') ";
    mysqli_query($conn, $query);
    echo
    "
<script> alert('Add sucessfully'); document.location.href ='../category/index.php';</script>
";
}
function edit(){
    global $conn;
    $id = intval($_GET["id"]);
    $name = $_POST["name"];
    
    $query = "UPDATE categories SET name ='$name' WHERE id =$id" ;
        mysqli_query($conn, $query);
        echo
        "
    <script> alert('Edit sucessfully'); document.location.href ='../category/index.php';</script>
    ";  

}
function delete(){
    global $conn;
    $id = $_POST["submit"];
    $query = "DELETE FROM products WHERE id =$id";
    mysqli_query($conn, $query);

    echo
        "
    <script> alert('Delete sucessfully'); document.location.href ='../category/index.php';</script>
    ";  
}
