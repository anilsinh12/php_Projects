 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
        width: 100%;
        border-collapse: collapse;
        }

        table, td, th {
        border: 1px solid black;
        padding: 5px;
        }
 

        th {text-align: left;}
    </style>
 </head>
 <body>
     
 <?php
    $id = intval($_GET['id']);
    $conn = mysqli_connect("localhost","root","","user");
    if(!$conn){
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql = "select * from ajxinfo where id='".$id."'";
    $result = mysqli_query($conn,$sql);
    echo "<table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Job</th>
                </tr>
            </thead>";
        
    while($data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['age'] . "</td>";
                echo "<td>" . $data['city'] . "</td>";
                echo "<td>" . $data['job'] . "</td>";
                echo "</tr>";
            }
        echo "</tabel>";

?>
 </body>
 </html>