<?php
    include('connection.php');
    // $update = false;
    $update = true;

    if(isset($_POST['update'])){

        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM uspope WHERE mobile='$mobile' OR email='$email'";
        $res = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($res) > 0) {
            $data = mysqli_fetch_assoc($res);
    
                if ($data['mobile'] == $mobile) {
                    echo "Mobile Number is already exists..";
                } elseif ($data['email'] == $email) {
                    echo "Sorry email is already exists..";
                }
            } else {
                $query = "select image from uspope WHERE id='" . $_GET["id"] . "'";
                $result = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($result);
                $filename_img = $data['image'];
                
                if (!empty($_FILES["filename"]["name"])) 
                {
                $filename = $_FILES["filename"]["name"];
                $tempname = $_FILES["filename"]["tmp_name"];
                $folder = "image/" . $filename;
                
                if(file_exists('image/'. $filename_img))
                {
                    unlink('image/'. $filename_img);
                }
                
                move_uploaded_file($tempname, $folder);
                $sql = "UPDATE uspope SET name='" . $_POST['name'] . "' ,  email='" . $_POST['email'] . "' , mobile='" . $_POST['mobile'] . "', age='" . $_POST['age'] . "', city='" . $_POST['city'] . "', gender='" . $_POST['gender'] . "' , image='" . $_POST['image'] . "' WHERE id='" . $_GET["id"] . "'";
                
            }else{
                    $sql = "UPDATE uspope SET name='" . $_POST['name'] . "' ,  email='" . $_POST['email'] . "' , mobile='" . $_POST['mobile'] . "', age='" . $_POST['age'] . "', city='" . $_POST['city'] . "', gender='" . $_POST['gender'] . "' image='" . $_POST['image'] . "  WHERE id='" . $_GET["id"] . "'";
                }
                
            $result = mysqli_query($conn, $sql);
            
            $message = "Record modified successfully...";
            header('location:index.php');
        }
    }
    
    


    if(count($_GET)>0)
    {
            // $update = true;

            $sql = "select * from uspope where id='" . $_GET["id"] . "'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .div1, .div2 {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
        }

        h2, h3 {
            color: #333;
        }

        form {
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 2px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        button, input[type="submit"], input[type="reset"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover, input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #2980b9;
        }

        input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="radio"] {
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 8px;
        }

        select {
            padding: 8px;
            margin-bottom: 10px;
        }
    </style>
<body>
    <div class="container">
    <div class="div1">
        <form action="insupd.php" method="POST" enctype="multipart/form-data">
            <h2>Crud Operations</h2>
            
                    <table>
                        <tr>
                            <td>
                                <?php
                                    if(isset($_GET["id"])){
                                        if(isset($data["filename"])){
                                            echo 'Please select file : '.$data['filename'];
                                        }else{
                                            echo 'No privious file : ';
                                            echo '<input type="file" name="filename"';
                                        }
                                    }else{
                                        
                                        echo '<input type="file" name="filename" id="" required>';
                                    }

                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Name :
                                <?php
                                    if(isset($_GET["id"]) && isset($data['name'])){
                                        echo '<input type="text" name="name" id="" value="'.$data['name'].'">';
                                    }else{
                                        echo '<input type="text" name="name" id="">';
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Email :
                                <?php
                                    if(isset($_GET["id"]) && isset($data['email'])){
                                        echo '<input type="text" name="email" id="" value="'.$data['email'].'">';
                                    }else{
                                        echo '<input type="text" name="email" id="">';
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Mobile No :
                                <?php
                                    if(isset($_GET["id"]) && isset($data['mobile'])){
                                        echo '<input type="text" name="mobile" id="" value="'.$data['mobile'].'">';
                                    }else{
                                        echo '<input type="text" name="mobile" id="">';
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Age :
                                <?php
                                    if(isset($_GET["id"]) && isset($data['age'])){
                                        echo '<input type="text" name="age" id="" value="'.$data['age'].'">';
                                    }else{
                                        echo '<input type="text" name="age" id="">';
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Gender :
                                <?php
                                    if(isset($_GET['id'])){ 
                        
                                        $selected_gender = (isset($_GET['gender'])) ? $data['gender'] : '' ;

                                        echo 'Male   <input type="radio" name="gender"   ' . (($selected_gender == "Male") ? 'checked' : '' ). '>
                                             Female   <input type="radio" name="gender" ' . ($selected_gender == "Female" ? 'checked' : '') . '>';

                        
                                        // echo 'Male   <input type="radio" name="gender" value="Male" '. ($selected_gender == "Male") ? 'checked' : '' . '>
                                        //     Female   <input type="radio" name="gender" value="Female" '. ($selected_gender == "Male" ? "checked" : '') . '>';

                                        // echo 'Male: <input type="radio" name="gender" value="male" '; if($data['gender'] == 'male') {echo 'checked';} echo ' >';
                                        // echo 'Female: <input type="radio" name="gender" value="female" '; if($data['gender'] == 'female') {echo 'checked';} echo ' >';
                                    }else{
                                        echo 'Male :  <input type="radio" name="gender" value="Male">';
                                        echo 'Female :  <input type="radio" name="gender" value="Female">';
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>City :

                                <?php

                                    if(isset($_GET["id"]) && isset($_GET['city'])){

                                        $selected_city = (isset($_GET['city'])) ? $data['city'] : '';

                                        echo '<select name="city" id="">
                                                <option value="">Select city..</option>
                                                <option value="Surat" ' .($selected_city == "Surat"      ?   "selected"  :   ''). '>Surat</option>
                                                <option value="Navsari" ' .($selected_city == "Navsari"  ?   "selected"  :   ''). '>Navsari</option>
                                                <option value="Maroli" ' .($selected_city == "Maroli"    ?   "selected"  :   ''). '>Maroli</option>
                                                <option value="Valsad" ' .($selected_city == "Valsad"    ?   "selected"  :   ''). '>Valsad</option>
                                                <option value="Vadodra" ' .($selected_city == "Vadodra"  ?   "selected"  :   ''). '>Vadodra</option>
                                            </select>';
                                    }else{
                                        echo '<select name="city" id="">
                                                <option value="">Select city..</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Navsari">Navsari</option>
                                                <option value="Maroli">Maroli</option>
                                                <option value="Valsad">Valsad</option>
                                                <option value="Vadodra">Vadodra</option>
                                            </select>';
                                    }
                                    
                                ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <?php
                                    if($update == true){
                                        echo '<button type="submit" name="update">Update</button>';
                                    }else{
                                        echo '<input type="submit" name="Submit" value="Submit">';
                                        
                                    }
                                ?>
                                <input type="reset" value="Reset">
                            </td>
                        </tr>


                    </table>
            
        </form>
    </div>

    <div class="div2">
            <h3>Display data </h3>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "select * from uspope";
                        $result = mysqli_query($conn,$sql);
                        while($data = mysqli_fetch_assoc($result)){?>

                        <tr>
                            <td><?php  echo $data['id']; ?></td>
                            <td><?php  echo $data['name']; ?></td>
                            <td><?php  echo $data['email']; ?></td>
                            <td><?php  echo $data['mobile']; ?></td>
                            <td><?php  echo $data['age']; ?></td>
                            <td><?php  echo $data['gender']; ?></td>
                            <td><?php  echo $data['city']; ?></td>

                            <td><img src="image/<?php echo $data['image']; ?>" height="50" width="50"></td>

                            <td><a href="image/<?php echo $data['image']; ?>" target = "_blank" view>View</a></td>
                            <td><a href="image/<?php echo $data['image']; ?>" download>Download</a></td>
                            <td><a href="index.php?id=<?php echo $data['id']; ?>">Update</a></td>
                            <td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                        </tr>

                    <?php } ?>

                    
                </table>

    </div>
</div>
</body>
</html>
 