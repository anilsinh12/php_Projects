 
<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
</head>
<body>
    <h2>Search for Jobs</h2>
    <form action="search_jobs.php" method="get">
        <label for="search">Search for Jobs:</label><br>
        <input type="text" id="search" name="search"><br><br>
        <input type="submit" value="Search">
    </form>
</body>
</html>

<?php
 
//     $servername = "localhost";
//     $username = "username";
//     $password = "password";
//     $dbname = "job_portal";

    
//     $conn = new mysqli($servername, $username, $password, $dbname);

 
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

 
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $search = $_GET["search"];

//     $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR location LIKE '%$search%' OR type LIKE '%$search%' OR company_name LIKE '%$search'";

//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             echo "Title: " . $row["title"] . "<br>";
//             echo "Description: " . $row["description"] . "<br>";
//             echo "Location: " . $row["location"] . "<br>";
//             echo "Type: " . $row["type"] . "<br>";
//             echo "Company Name: " . $row["company_name"] . "<br>";
//             echo "Application URL: " . $row["application_url"] . "<br><br>";
//         }
//     } else {
//         echo "No jobs found";
//     }
// }

// $conn->close();
// ?>
