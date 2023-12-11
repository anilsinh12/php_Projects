<?php
include("connection.php");

if(isset($_POST['submit'])) 
{
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    

    $sql = "insert into ucrud (name,email,age) values('$name','$email','$age')";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo "<script>alert('Sorry Data not Inserted')</script>";
    }else{
       echo "<script>alert('Data Inserted Successfully')</script>";
       header("location:index.php");
    }
}
?>
 
 