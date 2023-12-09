<html>
<body>

   <form action="file_demo.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		
		
		<input type="submit" name="submit">
   
   </form>
</body>

</html>

<?php
 if(isset($_POST['submit']))
 {
	 echo "File name".$_FILES['file']['name'];
	 
	 echo<br>;
	 echo "File name".$_FILES['file']['type'];
	 	 echo<br>;
		  echo "File name".$_FILES['file']['size'];//the size of the file in bytes
		  echo<br>;
		   echo "File name".$_FILES['file']['type'];
		   echo<br>;
		   echo "File name".$_FILES['file']['temp_name'];
		   
		   echo<br>;
		   echo "File name".$_FILES['file']['error']; // it displayed ERROR CODE associated with file upload
	 
 }

?>