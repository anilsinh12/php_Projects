 

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uploading</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.uh.edu/css/refresh/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" 
          crossorigin="anonymous">  -->
 </head>
 <body>
    <!-- <script src="https://uh.edu/js/jquery.js"></script>
    <script src="https://uh.edu/js/bootstrap.min.js"></script> -->
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <div class="container">
        <h2 class="text-success">Image Uploading</h2>
        <form action="insert.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Name :</label>
                <input type="text" name="name" id="exampleInputName" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputFile">File input :</label>
                <input type="file" name="fileupload" id="exampleInputFile" required>
                
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                <input type="reset" class="btn btn-secondary" name="Reset" value="Reset">   
            </div>
        </form>
    </div>
 

    <table border="2" class="table t">
         <thead class="thead-dark">
             <tr  class="row" style="text-align:center;">
                 <th class="col">ID</th>
                 <th class="col">Name</th>
                 <th class="col-1">Image</th>
                 <th class="col">Operation</th>
             </tr>
        </thead>

            <?php
                include('connection.php');

                $sql = "select * from uimg";
                $result = mysqli_query($conn,$sql);
                
                while($data=mysqli_fetch_assoc($result)){
            ?>

        <tr class="row">
            <td class="col" style="text-align:center;"><b><?php echo $data['id']; ?></b></td>
            <td class="col" style="text-align:center;"><b><?php echo $data['name']; ?></b></td>

            <td class="col-1" style="display:flex;align-items:center;justify-content:center;">
                <img src="image/<?php echo $data['image']; ?>" height="50" width="50" class="rounded">
            </td>
            
            <td class="col">
                <a href="image/<?php echo $data['image']; ?>"        target = "_blank" class="btn btn-success">View</a>
                <a href="image/<?php echo $data['image']; ?>"        download class="btn btn-info">Download</a>
                <a href="delete.php?id=<?php echo $data['id']; ?>"   class="btn btn-danger">Delete</a>
            
            </td>
        </tr>
<?php
    }
?>
    </table>

</body>
</html>
