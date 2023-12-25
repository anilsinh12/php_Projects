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
                        Category :: <input type="text" name="name" id="name">
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

    <center>
        <h2>Display data</h2>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td colspan="2">Operation</td>
                </tr>
            </thead>

            <tbody id="tbody">

                
            </tbody>
        </table>
    </center>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
     <script>
         $(document).ready(function(){
            fetch();
            showsubmitbtn();
         });

         $('#tbody').on('click' ,'.delete' ,function(){
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
            $("#updateid").show();
             
         }

        function fetch(){
            $.ajax({
                    method:'POST', 
                    url:'category_fetch.php',

                    dataType:'json',

                    success:function(data){
                        var jsonData = JSON.stringify(data);
                        var resultdata = jQuery.parseJSON(jsonData);

                        if (resultdata.status == 1) 
                        {
                            var table = "";
                            for (var i in resultdata.categorydata)
                            {
                                table += '<tr>';
                                    table += '<td>'+resultdata.categorydata[i].id+'</td>';
                                    table += '<td>'+resultdata.categorydata[i].name+'</td>';
                                    table += '<td><a href="javascript:void(0)" class="edit" data-id="'+resultdata.categorydata[i].id+'">Edit</a></td>';
                                    
                                    table += '<td><a href="javascript:void(0)" class="delete" data-id="'+resultdata.categorydata[i].id+'">Delete</a></td>';
                                table += '</tr>'
                            }
                            $('#tbody').html(table)
                        }
                    }
                    });
                }
            
                 function edit(id){
                                $.ajax({
                                    method:'POST', 
                                    url:'category_edit.php',

                                    data:{id:id},
                                    dataType:'json',

                                    success:function(data){
                                        var jsonData = JSON.stringify(data);
                                        var resultdata = jQuery.parseJSON(jsonData);

                                        if (resultdata.status == 1) 
                                        {
                                            $('#id').val(id);
                                            $('#name').val(resultdata.name);
                                            showupdatebtn();
                                            
                                            // alert(resultdata.message);
                                            fetch();
                                        }// }else{
                                        //     alert(resultdata.message);
                                        // }
                                    }
                                });

                }


                function deleted(id){
                    $.ajax({
                        method:'POST', 
                        url:'category_delete.php',

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
                    });

                }















        $('#myform').validate({
            rules :{
                name:{
                    required:true
                }
            },
            messages:{
                name:{
                    required:"Please enter category name!"
                }
            },

            submitHandler:function(form){
                if($('#id').val() == ''){
                    var url = 'category_insert.php';
                }else{
                    var url = 'category_update.php';
                }


                alert('Submited');
                var formdata = new FormData(form);
                // var id = $('#id').val();
                $.ajax({
                    method:'POST', 
                    url: url,
                    data:formdata,
                    // data:{id:id,name:name}
                    contentType:false,
                    processData:false,
                    dataType:'json',

                    success:function(data){
                        var jsonData = JSON.stringify(data);
                        var resultdata = jQuery.parseJSON(jsonData);

                        if (resultdata.status == 1) 
                        {
                            alert(resultdata.message);
                            fetch(); 
                            showsubmitbtn();
                        } else {
                            alert(resultdata.message);
                        }
                    }


                });
            
            }

        });
     </script>
     
</body>
</html>