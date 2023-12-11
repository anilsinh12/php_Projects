<?php
    $hostname = "localhost";
    $usernmae = "root";
    $password = "";
    $database = "user";

    $conn = mysqli_connect($hostname,$usernmae,$password,$database);
    // if(!$conn){
    //     echo '<script>Swal.fire({
    //         icon: "error",
    //         title: "Oops...",
    //         text: "Something went wrong!",

    //       });</script>';
    // }else{
        // echo '<script>Swal.fire({
        //     icon: "success",
        //     title: "Yehh..",
        //     text: "Connected Successfully!",

        //   });</script>';
    // }

    if($conn){
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Yehh..',
            text: 'Connected Successfully!',

          });</script>";
    }

?>