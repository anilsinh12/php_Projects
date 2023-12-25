<?php

    $conn = mysqli_connect("localhost","root","","d_b");

    $sql= "delete from cate_demo where id='".$_POST['id']."'";

    $result = mysqli_query($conn,$sql);

    if($result){
        $res['status'] = 1;
        $res['message'] = "deleted";
    }else{
        $res['status']=0;
        $res['message']="Not Deleted";
    }

 $jsondata = json_encode($res);

echo $jsondata;


?>