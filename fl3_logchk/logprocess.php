<?php
session_start();

//  if(isset($_REQUEST['login']))
//  {
//     if($_POST["em"] == $_POST["hde"] && $_POST["pass"] == $_POST["hdp"])
//     {
//         echo("Login");
//         // header("location:success.php");
//     }else{
//         echo("Failed");
//         // header("location:failer.php");
//     }

//  }
    include 'connection.php';

    if(isset($_POST['login']))
    {
        $email = $_POST['em'];
        $pass = $_POST['pass'];
        $password= md5($pass);
     

        $sql=mysqli_query($conn,"SELECT * FROM ulogin where email='$email' and password='$password'");
        if( $row  = mysqli_fetch_assoc($sql))
        {
            header("location:home.php"); 
        }else{
            echo "Invalid Email ID/Password";
        }
    }
?>



