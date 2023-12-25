<?php
    $conn = mysqli_connect("localhost","root","","d_b");

    $sql = "select * from cate_demo";

    $result = mysqli_query($conn,$sql);

    $i = 0;
    if($result){
        while($data = mysqli_fetch_assoc($result)){
            $res['data'][$i]['id'] = $data['id'];
            $res['data'][$i]['name'] = $data['name'];
            $i++;
        }
        $res['status'] = 1;
        $res['message'] = "Fetched";
    }else{
        $res['status'] = 0;
        $res['message'] = "Not data found ";
    }

    $jsondata = json_encode($res);
    
    echo $jsondata;
?>