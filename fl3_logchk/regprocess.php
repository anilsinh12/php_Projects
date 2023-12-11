<?php
    include("connection.php");

    
    
    // $sql=mysqli_query($conn,"SELECT * FROM ulogin where email='$email'");
    // if(mysqli_num_rows($sql)>0)
    // {
    //     echo "Email Id Already Exists"; 
    //     exit;
    // }

    if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $email= $_POST['email'];
        $pass= $_POST['password'];
        $age= $_POST['age'];
        $password= md5($pass);

        // $query=mysqli_query($conn,"select * from ulogin where email='$email'");
        // if (mysqli_num_rows($query)>0)
        // {
        // header("location:reg.php?message=User name or Email id already exists.");
        // }

        $sql="insert into ulogin (name,email,password,age) values('$name','$email','$password','$age')";     
        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "<script>alert('Sorry Data not Inserted')</script>";
        }else{
            
            // echo "<script>alert('Data Inserted Successfully')</script>";
            header("location:log.php");
            
        }
    }
?>