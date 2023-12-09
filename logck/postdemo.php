 

<html>
  <body>
         <center>
	
			<form method="POST" action="#">
			    Name :<input type="text" name="nm">

			 
				
				<input type="submit" name="btnsave" value="LOGIN">
			</form>
			
			<?php
			   if($_SERVER["REQUEST_METHOD"] == "POST")
			   {
				  $name = $_POST['nm']; 
				   if (empty($name))
				   {
					   echo "field is empty";
					   
				   }else
				   {
					   
					  echo $name; 
				   }
				   
				   
				   
			   }
			?>
		 </center>
	</body>
</html>