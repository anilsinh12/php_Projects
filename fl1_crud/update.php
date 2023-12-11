<?php
 
include_once("connection.php");

    if(count($_POST)>0){
        mysqli_query($conn,"UPDATE ucrud set name='" . $_POST['name'] . "',
                                            email='" . $_POST['email'] . "',
                                            age='" . $_POST['age'] . "' 
                                        where id='" . $_REQUEST["id"] . "'"); 
        echo "<script>alert('Data Updated Successfully')</script>";
    }

        $sq = "select * from ucrud where id ='".$_GET["id"]."'";
        $result = mysqli_query($conn,$sq);
        $data = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">  
</head>

<body>

<center>
    <h1> Edit User Form</h1>
    <form action="" method="POST">
        
            <table border="1"> 
                <tr>
                    <th>
                        Name: 
                    </th>
                    <td>
                        <input type="text" id="name" name="name" value = "<?php echo $data['name']; ?>" required> 
                    </td>
                </tr>
    
                <tr>
                    <th>
                        Email: 
                    </th>
                    <td>
                        <input type="email" id="email" name="email" value = "<?php echo $data['email']; ?>" required><br><br>
                    </td>
                </tr>
    
                <tr>
                    <th>
                        Age: 
                    </th>
                    <td>
                        <input type="text" id="age" name="age" value = "<?php echo $data['age']; ?>"  required>
                    </td>
                </tr>
    
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Update" name="submit">
                    </td>
                </tr>
            </table>            
        </form>
    </center>
</body>
</html>