<?php
    include('connection.php');
    $id = $_GET['id'];
    $sql = "delete from uspope where id= '$id'";

    $result = mysqli_query($conn,$sql);

    if(!$result) {
        echo 'Error';
        } else{
            header("Location: index.php");
     }
?>