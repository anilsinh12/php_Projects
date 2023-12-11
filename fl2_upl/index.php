<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uploading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>  
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900,300);  
        @import url(http://weloveiconfonts.com/api/?family=fontawesome);  
        
        body {   
            height: 100%;
            width: 100%;   
            background-color: #333;   
            color: whitesmoke;   
            font-size: 16px;   
            font-family: 'Lato'; 
            
        }   
        form{
            width:400px;
            border:2px solid white;  
        }
    </style>
   
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    
    <div class="container d-flex justify-content-center">
        <form action="uploader.php" method="POST" class="row g-3" enctype="multipart/form-data">
            
            <div class="col-auto">
                <label for="fileupl" class="form-label">Select File:  </label>
                <input type="file" name = "fileToUpload"  id="fileupl" class="form-control">
            </div>
    
            <div class="col-auto">
                <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button> 
            </div>
        </form>
    </div>
        
  
</body>
</html>
 