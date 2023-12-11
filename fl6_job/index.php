 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job posting Form</title>
 </head>
 <body>
   <form action="job_process.php" method="POST">
         <label for="title">Job Title:</label><br>
         <input type="text" id="title" name="title"><br>
         
         <label for="description">Job Description:</label><br>
         <input type="text" id="description" name="description"><br>
                
         <label for="location">Job Location:</label><br>
         <input type="text" id="location" name="location"><br>
         
         <label for="type">Job Type:</label><br>
         <input type="text" id="type" name="type"><br>
         
         <label for="company_name">Company Name:</label><br>
         <input type="text" id="company_name" name="company_name"><br>
         
         <label for="application_url">Application URL:</label><br>
         <input type="text" id="application_url" name="application_url"><br><br>
         
         <input type="submit" name="submit" value="Post Job">

   </form>
 </body>
 </html>
 