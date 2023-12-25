<?php
    $conn = mysqli_connect("localhost","root","","d_b");

    

    $sql = "select * from category where id='".$_POST['id']."'";

    $result = mysqli_query($conn,$sql);

   $data = mysqli_fetch_assoc($result);

    if($result){
         $res['name'] = $data['name'];
        $res['status'] = 1;
        $res['message'] = "Edited";
    }else{
        $res['status']=0;
        $res['message']="Not edited";
    }
    $jsondata = json_encode($res);

    echo $jsondata;

?>