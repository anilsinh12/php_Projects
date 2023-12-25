<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border:2px solid black;
    }

    tr,td{
        border:2px solid black;
    }
    label.error{
        color:#f00;
    }
</style>
<body>
    <form action="" method="POST" id="myform">
        <center>
            <table>
                <tr>
                    <td>
                        name :: <input type="text" name="name" id="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        age :: <input type="text" name="age" id="age">
                </tr>
                <tr>
                    <td>
                        city :: <input type="text" name="city" id="city">
                    </td>
                </tr>

                <tr>
                    <td>
                        salary :: <input type="text" name="salary" id="salary">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="submit" name="submit" id="submit">
                        <input type="hidden" name="id" id="id">
                        <input type="submit" value="update" id="updateid" name="updateid">
                    </td>
                </tr>
            </table>
        </center>   
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script>
        $('#myform').validate({
            rules:{
                name :{
                    required:true
                },
                age :{
                    required:true
                },
                city :{
                    required:true
                },
                salary :{
                    required:true,
                    number:true
                }
            },

            messages:{
                name :{
                    required:"Please enter the name of person."
                },
                age:{
                    required:"Please enter the age of person."
                },
                city:{
                    required:"please enter the city of person"
                },
                salary:{
                    required:"Please provide the salary.",
                    number:"The salary must be a number."
                }
            },

            submitHandler:function(form){
                alert("submited");
            }
        });


    </script>
</body>
</html>