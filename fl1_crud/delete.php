<?php
 
include("connection.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM ucrud WHERE id=$id");
header("Location:index.php");

?>