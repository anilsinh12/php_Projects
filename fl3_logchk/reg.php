 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">          
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>          
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>          
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>          
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body>
<div class="container">  
  <h2> Registration Form </h2>  
  <form action ="regprocess.php" method="POST" class="form-capsule" role="form"> 
    <fieldset>
        <legend>Input field</legend>

        <div class="form-group">  
            <label for="nm"> Enter Name </label>  
            <input type="text" name="name" class="form-control" id="nm" placeholder="Enter Name" required="required" value="" >  
        </div>
        <div class="form-group">  
            <label for="email"> Enter Email </label>  
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email"  required="required" value="">  
        </div>  
    
        <div class="form-group">  
            <label for="pwd"> Password </label>  
            <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required="required">  
        </div>  
    
        <div class="form-group">  
            <label for="ag"> Age </label>  
            <input type="text" name="age" class="form-control" id="ag" placeholder="Enter Age" required="required">  
        </div> 
    
         
            <input type="submit" name="submit" class="btn btn-primary" value="submit"> 
            <input type="reset"  name="reset" class="btn btn-info" value="reset">
         
    </fieldset> 
        <!-- C:\xampp\htdocs\fl3_logchk\reg.php -->
        <div class="text-center">Already have an account?
             <a href="log.php">Sign in</a>
        </div>
 </form>
</body>
</html>
 