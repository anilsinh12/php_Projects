<?php
    include('connection.php');
    // insert query
    if(isset($_POST['Submit'])){

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
                
                $filename = $_FILES['filename']['name'];
                $temp_name = $_FILES['filename']['tmp_name'];
                $folder = "./image/" . $filename;
    
                $name = $_POST['name'];
                $new_email = $_POST['email'];
                $new_mobile = $_POST['mobile'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $city = $_POST['city'];
                
                if (!is_dir("./image/")) {
                    mkdir("./image/");
                }
    
                $sql = "INSERT INTO uspope (name, email, mobile, age, gender, city, image) VALUES ('$name', '$new_email', '$new_mobile', '$age', '$gender', '$city', '$filename')";
                $result = mysqli_query($conn, $sql);

                if (move_uploaded_file($temp_name, $folder)) {
                    header('location:index.php');
                }

            }
        }






        
    

?>