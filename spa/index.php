<?php

$conn = mysqli_connect('localhost','root','','d_b');
$update = false;
if(isset($_POST['submit']))
{
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    $sql = "select * from spa where mobile= '$mobile'  OR email= '$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $data = mysqli_fetch_assoc($result);
        if($data['mobile'] == $mobile)
        {
            echo "Mobile Already Exits";
        }
        else if($data['email'] == $email)
        {
            echo "Email already Exits";
        }
    }
    else 
    {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $filename = $_FILES['filename']['name'];
    $tempname = $_FILES['filename']['tmp_name'];
    $folder = 'img/' . $filename;
    
    $sql = "insert into spa(fname,lname,mobile,email,city,gender,filename) values('$fname','$lname','$mobile','$email','$city','$gender','$filename')";
    
    $result = mysqli_query($conn,$sql);
    move_uploaded_file($tempname,$folder);
}
}
?>

<?php
$conn = mysqli_connect('localhost','root','','d_b');

if(isset($_POST['update']))
{

    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $sql = "Select * from spa where (mobile = '$mobile' OR email = '$email') AND id <> '" . $_GET["id"] . "'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $data = mysqli_fetch_assoc($result);
        if($data['mobile'] == $mobile)
        {
            echo "Mobile number already Exists";
        }
        else if($data['email'] == $email)
        {
            echo "Email already Exists";
        }
    }
    else
    {

        $sql = "select filename from spa where id= '" . $_GET["id"] . "'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        $filename_img = $data['filename'];
        
        if(!empty($_FILES['filename']['name']))
        {
            $filename = $_FILES['filename']['name'];
            $tempname = $_FILES['filename']['tmp_name'];
            $folder = "img/" . $filename;
            
            move_uploaded_file($tempname,$folder);
            $sql = "update spa set fname= '" .$_POST['fname'] . "', lname='" . $_POST['lname'] . "', mobile='" . $_POST['mobile'] . "', email='" . $_POST['email'] . "', city='" . $_POST['city'] . "', gender='" . $_POST['gender'] . "', filename='" . $filename . "' where id= '" . $_GET["id"] . "'";
            
            if('img/' . $filename_img)
            {
                unlink('img/' . $filename_img);
            }
            
        }
        else
        {
            $sql = "update spa set fname= '" .$_POST['fname'] . "', lname='" . $_POST['lname'] . "', mobile='" . $_POST['mobile'] . "', email='" . $_POST['email'] . "', city='" . $_POST['city'] . "', gender='" . $_POST['gender'] . "' where id= '" . $_GET["id"] . "'";
        }
        $result = mysqli_query($conn,$sql);
        $message = "Message modify succesfully";
    }
}

if(count($_GET)>0)
{
    $update = true;
    $sql = "select * from spa where id= '" . $_GET["id"] . "'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
    $message = "Message modify succesfully";
}
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
        border:2px solid black;
    }
    tr,td 
    {
        border:2px solid black;
    }
</style>
<body>
    <center>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td> FName:
                        <?php
                            if(isset($_GET['id']) && (isset($data['fname'])))
                            {
                                echo '<input type = "text" name="fname" value="' .$data['fname'].'">';
                            }
                            else
                            {
                                echo '<input type = "text" name="fname">';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                       LName:
                       <?php
                            if(isset($_GET['id']) && (isset($data['lname'])))
                            {
                                echo '<input type="text" name="lname" value="' . $data['lname'].'">';
                            }
                            else
                            {
                                echo '<input type="text" name="lname" id="lname">';
                            }
                       ?>
                       
                    </td>
                </tr>
                <tr>
                    <td>
                       Mobile: 
                       <?php
                            if(isset($_GET['id']) && (isset($data['mobile'])))
                            {
                                echo '<input type="number" name="mobile" value="' .$data['mobile']. '">';
                            }
                            else
                            {
                                echo '<input type="number" name="mobile">';
                            }
                       ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                        <?php
                            if(isset($_GET['id']) && (isset($data['email'])))
                            {
                                echo '<input type="email" name="email" value="' .$data['email']. '">';
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
                            if(isset($_GET['id']) && (isset($data['city'])))
                            {
                               $select = isset($data['city']) ? $data['city'] : '';
                                echo "<select name='city'>
                                    <option value='Surat' ".($select == 'Surat' ? 'selected' : '').">Surat</option>
                                    <option value='Vadodara' ".($select == 'Vadodara' ? 'selected' : '').">Vadodara</option>
                                    <option value='Navsari' ".($select == 'Navsari' ? 'selected' : '').">Navsari</option>
                                    <option value='Bharuch' ".($select == 'Bharuch' ? 'selected' : '').">Bharuch</option>
                                    <option value='Sachin ".($select == 'Sachin' ? 'selected' : '')."'>Sachin</option>
                                </select>";
                            }
                            else
                            {
                                echo '<select name="city" id="city">
                                <option value="Surat">Surat</option>
                                <option value="Vadodara">Vadodara</option>
                                <option value="Navsari">Navsari</option>
                                <option value="Bharuch">Bharuch</option>
                                <option value="Sachin">Sachin</option>
                                    </select>';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Gender:

                            <?php
                                if(isset($_GET['id']) && (isset($data['gender'])))
                                {
                                    echo 'Male: <input type="radio" name="gender" value="male"'; if($data['gender'] == 'male') {echo 'checked';} echo '>';
                                    echo 'Female: <input type="radio" name="gender" value="female"'; if($data['gender'] == 'female') {echo 'checked';} echo '>'; 
                                }
                                else
                                {
                                    echo 'Male:<input type="radio" name="gender" id="" value="male">';
                                    echo 'FeMale:<input type="radio" name="gender" id="" value="female">';
                                }
                            ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?php
                            if(isset($_GET['id']))
                            {
                                if(isset($data['filename']))
                                {
                                    echo "Please select file: " . $data['filename'];
                                    echo '<input type="file" name="filename">';
                                }
                                else
                                {
                                    echo "No Previous Files";
                                    echo '<input type="file" name="filename">';
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
                    <td>
                        <?php
                            if($update == true)
                            {
                                ?>
                                <button type="submit" name="update">Update</button>
                                <?php
                            }
                            else 
                            {
                                ?>
                                <button type="submit" name="submit">Submit</button>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <br><br>
    <center>
        <h2>Fetch Data:</h2>
        <table>
            <tr>
                <td>ID:</td>
                <td>Fname:</td>
                <td>Lname:</td>
                <td>Mobile:</td>
                <td>Email:</td>
                <td>City:</td>
                <td>Gender:</td>
                <td>File:</td>
                <td>Operation:</td>
                <td>Operation:</td>
            </tr>

            <?php 
                $conn = mysqli_connect('localhost','root','','d_b');
                $sql = "select * from spa";
                $result = mysqli_query($conn,$sql);

                while($data = mysqli_fetch_assoc($result))
                {
                    ?>
                        <tr>
                            <td><?php echo $data['id'];?></td>
                            <td><?php echo $data['fname'];?></td>
                            <td><?php echo $data['lname'];?></td>
                            <td><?php echo $data['mobile'];?></td>
                            <td><?php echo $data['email'];?></td>
                            <td><?php echo $data['city'];?></td>
                            <td><?php echo $data['gender'];?></td>
                            <td style="padding:10px";><img src="img/<?php echo $data['filename'];?>" alt="image" height="100px"; width="100px";></td>
                            <td><a href="delete.php?id=<?php echo $data["id"]; ?>">Delete</a></td>
                            <td><a href="index.php?id=<?php echo $data["id"];?>">Update</a></td>
                        </tr>
                <?php }?>
        </table>
    </center>
</body>
</html>


<!--
//this is extra delete page...
<?php
    $conn = mysqli_connect('localhost','root','','d_b');
    $sql = "delete from spa where id= '" .$_GET["id"] .  "'";
    $result = mysqli_query($conn,$sql);
    header('location:index.php');
?>

-->

<!--
//database entities name:
id 
fname 
lname
mobile 
email 
city 
gender 
filename 

-->