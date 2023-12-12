<?php
    $conn = mysqli_connect('localhost', 'root', '', 'instance');

    $update = false;


    include('insert.php');

    include('update.php');
    
 
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table 
    {
        border: 2px solid black;
    }

    tr,td 
    {
        border: 2px solid black;
        text-align: center;
    }
</style>

<body>
    <form method="POST" enctype="multipart/form-data">
        <center>
            <h2>Crud Operation</h2>
            <table>
                <tr>
                    <td>
                    <?php 
                        if(isset($_GET["id"])) 
                        {
                            if(isset($data['filename'])) 
                            {
                                echo 'Please Select File: ' . $data['filename'];
                                echo '<input type="file" name="filename">';
                            } else 
                            {
                                echo 'No Previous File';
                                echo '<input type="file" name="filename" >';
                            }
                        } 
                        else 
                        {
                            echo '<input type="file" name="filename" required>';
                        }
                    ?>
                    </td>
                </tr> 
                <tr>
                        <td>Fname:
                        <?php 
                            if(isset($_GET["id"]) && isset($data['fname']))
                            {
                                echo '<input type="text" name="fname" value="' . $data['fname'] .  '">';
                            }
                            else
                            {
                                echo '<input type="text" name="fname">';
                            }
                        ?>
                        </td>
                </tr>
                <tr>
                    <td>Lname:            
                        <?php 
                            if(isset($_GET["id"]) && isset($data['lname']))
                            {
                                echo '<input type="text" name="lname" value="' . $data['lname'] . '">';
                            }
                            else
                            {
                                echo '<input type="text" name="lname">';
                            }
                        ?>
                       
                    </td>
                </tr>
                <tr>
                    <td>Mobile:
                        <?php 
                            if(isset($_GET["id"]) && isset($data['mobile']))
                            {
                                echo '<input type="text" name="mobile" value="' . $data['mobile'] . '">';
                            }
                            else
                            {
                                echo '<input type="text" name="mobile">';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:
                        <?php
                            if(isset($_GET["id"]) && isset($data['email']))
                            {
                                echo '<input type="email" name="email"  value="' . $data['email'] . '">';
                            }
                            else
                            {
                                echo '<input type="email" name="email">';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>City:
                    <?php

                    if(isset($_GET["id"]) && isset($data['city']))
                    {
                        $selected_city = isset($data['city']) ? $data['city'] : '';
                            echo "<select name='city'>
                                    <option value='surat' ".($selected_city == 'surat' ? 'selected' : '').">surat</option>
                                    <option value='Navsari' ".($selected_city == 'Navsari' ? 'selected' : '').">Navsari</option>
                                    <option value='Bharuch' ".($selected_city == 'Bharuch' ? 'selected' : '').">Bharuch</option>
                                    <option value='Vadodara' ".($selected_city == 'Vadodara' ? 'selected' : '').">Vadodara</option>
                                    <option value='Ahmadabad' ".($selected_city == 'Ahmadabad' ? 'selected' : '').">Ahmadabad</option>
                                </select>";
                    }
                    else  
                    {
                            echo '<select name="city">
                                    <option value="surat">surat</option>
                                    <option value="Navsari">Navsari</option>
                                    <option value="Bharuch">Bharuch</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Ahmadabad">Ahmadabad</option>
                                </select>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                <td>
                    <?php

                        if(isset($_GET["id"]) && isset($data['gender']))
                        {
                            echo 'Male: <input type="radio" name="gender" value="male" '; if($data['gender'] == 'male') {echo 'checked';} echo ' >';
                            echo 'Female: <input type="radio" name="gender" value="female" '; if($data['gender'] == 'female') {echo 'checked';} echo ' >';
                        }
                        else
                        {
                            echo 'Male: <input type= "radio" name="gender" value="male">';
                            echo 'Female: <input type= "radio" name="gender" value="female">';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 
                            if($update == true)
                            {
                                ?>
                                <button type="submit" name="update">Update</button>
                                <?php 
                            }else{
                                 ?>
                                 <button type="submit" name="submit">Submit</button>
                                <?php 
                            }
                        ?>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </center>
    </form>
    <br><br><br>
    <center>
        <h2>Fetch Data</h2>
        <table>
            <tr>
                <td>File:</td>
                <td>Fname</td>
                <td>Lname</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>City</td>
                <td>Gender</td>
                <td>Operation</td>
                <td>Operation</td>
                <td>view</td>
                <td>download</td>
            </tr>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'instance');
            $update = false;
            $sql = "select * from crud2";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td style="padding 10px;"><img src="img/<?php echo $data["filename"];?>" alt="images" height="100px" width="200px"></td>
                    <td><?php echo $data['fname']; ?></td>
                    <td><?php echo $data['lname']; ?></td>
                    <td> <?php echo $data['mobile']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['gender']; ?></td>

                    <td><a href="delete.php?id=<?php echo $data["id"]; ?>">Deleted</td>
                    <td><a href="insertEx1.php?id=<?php echo $data["id"]; ?>">Update</td>
                    <td><a href="img/<?php echo $data['filename']?>"view>view</a></td>         
                    <td><a href="img/<?php echo $data['filename']?>"download>download</a></td>         
                </tr>
            <?php } ?>
        </table>
    </center>
</body>

</html>