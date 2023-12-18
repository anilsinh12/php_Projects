<?php

$conn = mysqli_connect('localhost','root','','d_b'); // Changed database name to d_b

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "select filename from spa where id= '" . $id . "'"; // Changed table name to spa
  $result = mysqli_query($conn,$sql);
  $data = mysqli_fetch_assoc($result);
  $filename_img = $data['filename'];

  if($filename_img)
  {
    unlink('img/' . $filename_img); // Delete profile picture from uploads folder
  }

  $sql = "delete from spa where id= '" . $id . "'";   
  $result = mysqli_query($conn,$sql);

  if($result)
  {
    header('Location: index.php');  
  }
  else
  {
    echo "Error deleting record";
  }
}
