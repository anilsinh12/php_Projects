<?php
    include('connection.php');

    $sql = "delete from uimg where id='".$_GET['id']."'";

    $res = mysqli_query($conn,$sql);

    if($res){
        header("location:index.php");
    }else{
        echo "not deleted";
    }

?>
