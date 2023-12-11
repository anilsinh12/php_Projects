<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">          
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>          
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>          
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>          
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">  
  <h2> Registration Form </h2>  
  <form action="logprocess.php" method="POST" name="frm" class="form-capsule" onsubmit="return validation()"> 
    <fieldset>
        <legend>Input field</legend>

        <div class="form-group">  
            <label for="email"> Enter Email </label>  
            <input type="email" name="em" class="form-control" id="email" placeholder="Enter Email" >  
        </div>  
    
        <div class="form-group">  
            <label for="pwd"> Password </label>  
            <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter Password">  
        </div>  
       
         
            <input type="submit" name="login" class="btn btn-primary" value="Login"> 
            <input type="reset"  name="reset" class="btn btn-info" value="reset">
         
             
    </fieldset> 
     
    <div class="text-center">Don't have an account? <a href="reg.php">Register Here</a></div>        
 </form>


<script>

    function validation(){

        var email =  document.getElementById('email').value;
        var password = document.getElementById('pwd').value;
    
        if(email === ""  && password === ""){
            alert("User Name and Password fields are empty");  
            return false;
        }else{
            if(email === ""){
                alert("User Name is empty");  
                return false;  
            }
            if(password ===""){
                alert("Password field is empty");  
                 return false;  
            }
        }

     
    }

</script>
            
</body>
</html>
