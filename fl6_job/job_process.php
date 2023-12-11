<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user";

 
$conn =  mysqli_connect($servername, $username, $password, $dbname);

 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected successfully";
}

echo "Connected successfully";
 
if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $company_name = $_POST['company_name'];
        $application_url = $_POST['application_url'];

        $sql = "insert into jobs (title, description, location, type, companyname, applicationurl) values ('$title','$description', '$location', '$type', '$company_name', '$application_url')";
        
         
        if(mysqli_query($conn,$sql)) {
            echo "Job posted successfully";
        }else{
            echo "Job posting failed";
        } 
}

 
?>
