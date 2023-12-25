<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
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
                        <input type="text" name="name" id="name">
                    </td>
                </tr>
    
                <tr>
                    <td>
                        <input type="submit" value="submit" name="submit">
                        <input type="hidden" name="id" id="id">
                        <input type="submit" value="update" id="update" name="update">
                    </td>
                </tr>
            </table>
        </center>
        
    </form>

    <center>
        <h2>Display Data</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>

            <tbody id="tbody">

            </tbody>
        </table>
    </center>

    <script>
        $(document).ready(function(){
            fetch();
           
         });

         $('#tbody').on('click','.delete',function(){
            var id = $(this).attr('data-id');
            deleted(id);
         });

        $('#tbody').on('click' ,'.edit' ,function(){
            var id = $(this).attr('data-id');
            edit(id);
         });

         function showsubmitbtn(){
            $("#submit").show();
            $("#updateid").hide();
            $("#name").val('');
         }

         function showupdatebtn(){
            $("#submit").hide();
            $("#update").show();
             
         }


        function fetch(){
            $.ajax({
                method:"POST",
                url:'fetch.php',
                dataType:'json',
                success:function(data){
                    var jsonData = JSON.stringify(data);
                    var resultdata = jQuery.parseJSON(jsonData);

                    if(resultdata.status == 1){
                        var table = "";
                        for (var i in resultdata.data)
                        {
                            table += '<tr>';
                                table += '<td>'+resultdata.data[i].id+'</td>';
                                table += '<td>'+resultdata.data[i].name+'</td>';
                                table += '<td><a href="javascript:void(0)" class="edit" data-id="'+resultdata.data[i].id+'">Edit</a></td>';

                                table += '<td><a href="javascript:void(0)" class="delete" data-id="'+resultdata.data[i].id+'">Delete</a></td>';

                            table += '</tr>';
                        }
                        $('#tbody').html(table);
                    }
                }
            });
        }

        //validation with insert

        $('#myform').validate({
            rules:{
                name:{
                    required : true
                }
            },
            messages:{
                name:{
                    required: "Please enter your name!"
                }
            },

            submitHandler:function(form){
                var formdata =  new FormData(form);
                if($('#id').val() == ''){
                    var url = 'insert.php';
                }else{
                    var url = 'update.php';
                }


                alert('Submited');
                $.ajax({
                    method:'POST',
                    url:"insert.php",
                    data:formdata,
                    // data: { key1: 'value1', key2: 'value2' },
                    processData:false,
                    contentType:false,
                    dataType:'json',

                    success:function(data){
                        var jsonData = JSON.stringify(data);
                        var resultdata = jQuery.parseJSON(jsonData);

                        if(resultdata.status == 1){
                            alert(resultdata.message);
                            fetch();
                            showsubmitbtn();
                        }else {
                            alert(resultdata.message);
                        }

                    }


                });
            }
        });

        function edit(id){
            $.ajax({
                method:"POST",
                url:'edit.php',

                data:{id:id},
                dataType:'json',
                success:function(data){
                    var jsondata = JSON.stringify(data);
                    var resultdata = jQuery.parseJSON(jsondata);

                    if(resultdata.status == 1){
                        $('#id').val(id);
                        $('#name').val(resultdata.name);
                         showupdatebtn();
                        fetch();
                    }
                    
                }
            })
        }

        function deleted(id){
            $.ajax({
                method:'POST',
                url:'delete.php',

                data:{id:id},
                dataType:'json',
                success:function(data){
                    var jsonData = JSON.stringify(data);
                    var resultdata = jQuery.parseJSON(jsonData);
                     if (resultdata.status == 1) 
                     {
                        alert(resultdata.message);
                        fetch();
                    }else{
                        alert(resultdata.message);
                    }
                }
            })
        }
    </script>
</body>
</html>