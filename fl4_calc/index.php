<?php
    if(isset($_REQUEST['submit']))
    {
      
        $operator=$_REQUEST['operation'];
        $n1 =  $_REQUEST["text1"];
        $n2 = $_REQUEST["text2"];
       
       
         
        
        if($operator=="+")
        {
            $res= $n1+$n2;
        }
        if($operator=="-")
        {
            $res= $n1-$n2;
        }
        if($operator=="*")
        {
            $res =$n1*$n2;
        }
        if($operator=="/")
        {
             $res= $n1/$n2;
        }
        
        if($_REQUEST['text1']==NULL || $_REQUEST['text2']==NULL)
        {
            echo "<script language=javascript> alert(\"Please Enter Correct values.\");</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">  
    
</head>
<body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

<div class="container d-flex justify-content-center"> 
        <form action="index.php" method="POST">


            
                <table style="margin:50px;">
                    <tr class="mb-3">
                        <th>
                            <label for="exampleFormControlInput1" class="form-label">Enter a Number1 : </label>
                        </th>
                        <td>
                            <input type="text" name="text1" class="form-control" id="exampleFormControlInput1" placeholder="Enter a number " require>
                        </td>
                    </tr><br><br>
        
                    <tr class="mb-3">
                       <td >
                        <div class="mp-3">
                            <select name="operation"class="form-select" aria-label="Default select example">
                                <option name="opt" value="+">+</option>
                                <option name="opt" value="-">-</option>
                                <option name="opt" value="*">*</option>
                                <option name="opt" value="/">/</option>
                            </select>
                        </div>
                       </td>
                    </tr> 
        
                    <tr class="mb-3">
                        <th>
                             <label for="exampleFormControlInput1" class="form-label">Enter a Number2 : </label>
                        </th>
                        <td>
                             <input type="text" name="text2" class="form-control" id="exampleFormControlInput1" placeholder="Enter a number " require>
                        </td>
                    </tr><br><br>
        
                    <tr class="mb-3">
                        <td>
                            <div class="col-12 table-striped" >
                                <input type="submit" name="submit" class="btn btn-primary" value="Calculate">
                            </div>
                        </td>
                    </tr><br><br>
                    
                    <tr class="mb-3">
                        <th>
                             <label for="exampleFormControlInput1" class="form-label">Result : </label>
                        </th>
                         
                        <td>
                            <input type="text" name="result" class="form-control" id="exampleFormControlInput1" value="<?php echo $res; ?>" readonly>
                        </td>
                    </tr><br><br>
                </table>
            </form>
    </div>

             
        </body>
    
</html>

 