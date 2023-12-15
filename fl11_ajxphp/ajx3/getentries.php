<?php
include('connection.php');

$query = "SELECT * FROM ajxguest";
$result = mysqli_query($conn, $query);

$entries = array();
while ($row = mysqli_fetch_assoc($result)) {
    $entries[] = $row;
}

echo json_encode($entries);
?>