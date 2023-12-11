<?php
    include('connection.php');

    if(isset($_POST['upload'])){
        $name=$_POST['name'];
        $filename=$_FILES['fileupload']['name'];
        $tempname=$_FILES['fileupload']['tmp_name'];
        $folder ="./image/".$filename;

        $sql = "insert into uimg (name,image) values('$name','$filename')";
        $res = mysqli_query($conn,$sql);

        if(!move_uploaded_file($tempname,$folder)){
            echo "not uploaded";
        }else{
                echo "<script>alert('uploaded')</script>";
                header("location:index.php");
           
        }
         
    }
   

 

?>

