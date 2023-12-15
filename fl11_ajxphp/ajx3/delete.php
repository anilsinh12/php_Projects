<?php
include('connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM ajxguest WHERE id = $id";
    
    $result = mysqli_query($conn,$sql);
    echo "Entry deleted successfully!";
} else {
    echo "Invalid request.";
}
?>