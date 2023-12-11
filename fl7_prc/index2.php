<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>
<body>
    <?php

        $hostname = "localhost";
        $password = "";
        $username = "root";
        $database = "user";

        $conn = mysqli_connect($hostname,$username,$password,$database);

        if(!$conn){
            die("Connection failed" . mysqli_connect_error());
        }
        
        $result_per_page = 10;

        $q1= "select * from ualph";
        $res = mysqli_query($conn,$q1);
        $total_records = mysqli_num_rows($res);

        $number_of_page = ceil($total_records/$result_per_page);



        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }

        $page_first_res = ($page - 1) * $result_per_page;

        $q2 = "select * from ualph limit ". $page_first_res . ',' . $result_per_page;
         

        $res = mysqli_query($conn,$q2);

        while($data = mysqli_fetch_array($res)){
            echo ' '.$data['id'] .' --> '. $data['alphabet'] . '</br>';
               
        }

         for($page = 1;$page <= $number_of_page;$page++){
            echo '<a href="index2.php?page= '.$page.'">'.$page.'</a>';
         }  

    ?>
</body>
</html>