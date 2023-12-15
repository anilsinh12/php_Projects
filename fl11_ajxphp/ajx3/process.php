<?php

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql  = "insert into ajxguest (name,email) values('$name','$email')";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "Entry added successfully!";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}  
 
?>
