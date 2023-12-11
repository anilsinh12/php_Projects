<?php
    include('insert.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">  
    
</head>

<body>
     
  
<!-- C:\admin\xampp\htdocs\prg\fl1\index.php -->
 
<center>
    <h1>User Form</h1>
    <form action="insert.php" method="POST" class="form">
        <table border="1"  class="t1">

           <!-- <tr>
                <th>
                    Id: 
                </th>
                <td>
                    <input type="text" id="id" name="id" required><br><br>
                </td>              
            </tr>  -->
    
            <tr>
                <th>
                    Name: 
                </th>
                <td>
                    <input type="text" id="name" name="name" required>  
                </td>
            </tr>
    
            <tr>
                <th>
                    Email: 
                </th>
                <td>
                    <input type="text" id="email" name="email" required> 
                </td>
            </tr>
    
            <tr>
                <th>
                    Age: 
                </th>
                <td>
                    <input type="text" id="age" name="age" required> 
                </td>
            </tr>
    
            <tr>
                <th>
                    
                </th>
                <td> 
                    <input type="submit" value="Submit" name="submit">
                </td>
            </tr>
             
            
        </table>
        
        </form>
    </center>

    <div class="result">
    
        <center>
            <table border="2">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Operations</th>
                </tr>
                </thead>
                

                <?php
                    include('connection.php');

                    $sql = "select * from ucrud";
                    $res = mysqli_query($conn ,$sql);
                    while($data  = mysqli_fetch_assoc($res))
                    {
                 ?>
                    
                    <tbody>
                        <tr>
                            
                            <td><?php  echo $data['id'];?></td>
                            <td><?php  echo $data['name'];?></td>
                            <td><?php  echo $data['email'];?></td>
                            <td><?php  echo $data['age'];?></td>
                            <td class="ope">
                                <a href="delete.php?id=<?php echo $data["id"];?>" class="a1">Delete</a> | 
                                <a href="update.php?id=<?php echo $data["id"]; ?>" class="a2">Update</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    }
                ?>
    
            </table>
        </center>
    </div>
   
</body>

</html>

 
 


 