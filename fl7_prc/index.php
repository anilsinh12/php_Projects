<?php

// $pattern = "/o{2}/";
// $strings = ["gose", "look", "food"];

// foreach ($strings as $string) {
//     if (preg_match($pattern, $string)) {
//         echo "Pattern matched: $string\n";
//     } else {
//         echo "Pattern not matched: $string\n";
//     }
// }


// $pattern = "/o{1,3}/";
// $strings = ["gose", "lk", "foood","foooood"];

// foreach ($strings as $string) {
//     if (preg_match($pattern, $string)) {
//         echo "Pattern matched: $string\n <br>";
//     } else {
//         echo "Pattern not matched: $string\n <br>";
//     }
// }

// $pattern = "/colou?r/";
// $strings = ["color", "colour", "colouur"];

// foreach ($strings as $string) {
//     if (preg_match($pattern, $string)) {
//                 echo "Pattern matched: $string\n <br>";
//             } else {
//                 echo "Pattern not matched: $string\n <br>";
//             }
// }





?>


<html>  
<head>  
<title> Pagination </title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>  
<body>  
  
<?php  
  
     //- conncetion 
     //-result of per page
     //-Count the number of result
     //-number of page
     //-checking the page is set or not (if not the set with $page =  1)
    
     // - selecting the number of result (Required for per page)
    $conn = mysqli_connect('localhost', 'root', '','user');  
    if (! $conn) {  
        die("Connection failed" . mysqli_connect_error());  
    }else {  
        mysqli_select_db($conn, 'user');  
    }  
  
     
    $results_per_page = 10;  
  
     
    $query = "select * from ualph";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
 
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
   
    $page_first_result = ($page-1) * $results_per_page;  
  
      
    $query = "SELECT *FROM ualph LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  
      
  
    while ($row = mysqli_fetch_array($result)) {  
        echo ' '.$row['id'] . ' ==> ' . $row['alphabet'] . '</br>';  
    }  
  
    
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "index.php?page=' . $page . '" class="btn btn-primary">' . $page . ' </a>';  
    }  
  
?>  
</body>  
</html>  