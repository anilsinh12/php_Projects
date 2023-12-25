<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with PHP Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #f00;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
// Define variables and set to empty values
$nameErr = $ageErr = $emailErr = $imageErr = "";
$name = $age = $email = $image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate age
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate image
    if (empty($_FILES["image"]["name"])) {
        $imageErr = "Image is required";
    } else {
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_info = pathinfo($_FILES["image"]["name"]);
        $extension = strtolower($file_info['extension']);

        if (!in_array($extension, $allowed_types)) {
            $imageErr = "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
        } elseif ($_FILES["image"]["size"] > 1048576) { // 1 MB
            $imageErr = "Image size must be less than 1 MB.";
        } else {
            $image = $file_info['basename'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span>

    <label for="age">Age:</label>
    <input type="text" name="age" id="age" value="<?php echo $age; ?>">
    <span class="error"><?php echo $ageErr; ?></span>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <span class="error"><?php echo $imageErr; ?></span>

    <button type="submit">Submit</button>
</form>

</body>
</html>
