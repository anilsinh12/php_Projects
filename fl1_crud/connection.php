<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $databasename = "user"; 
  
    
  $conn = mysqli_connect($servername,$username, $password, $databasename); 
  
   
  if (!$conn) { 
      die("alert('Connection failed: ' . mysqli_connect_error())"); 
  }
  ?>