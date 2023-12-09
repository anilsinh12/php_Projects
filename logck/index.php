<html>
	<head>
	<title>	Login Page 	<title>
	</head>
	
	<body>
         <center>
			<form method="POST" action="#">
			    Name :<input type="text" name="nm">

				Password :<input type="password" name="pwd">
				
				<input type="submit" name="sbm" value="LOGIN">
			</form>
		 </center>
	</body>
</html>
<?php
  
  $user = $_REQEST['user'];
  $password = $_REQEST['password'];
  
?>