<?php
    $conn = mysqli_connect("localhost","root","","d_b");

    

    $sql = "select * from category";

    $result = mysqli_query($conn,$sql);

   

    if($result){
        $i = 0;
        while($data = mysqli_fetch_assoc($result)){
            $res['categorydata'][$i]['id'] = $data['id'];
            $res['categorydata'][$i]['name'] = $data['name'];
            $i++;
        }
        $res['status'] = 1;
        $res['message'] = "Fetched";
    }else{
        $res['status']=0;
        $res['message']="Not data found";
    }
    $jsondata = json_encode($res);

    echo $jsondata;

?>