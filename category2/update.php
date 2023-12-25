 <?php
    $conn = mysqli_connect("localhost","root","","d_b");

    // $name = $_POST['name'];

    $sql = "update cate_demo set name='".$_POST['name']."' where id ='".$_POST['id']."'";

    $result = mysqli_query($conn,$sql);

    if($result){
        $res['status'] = 1;
        $res['message'] = "Updated";
    }else{
        $res['status']=0;
        $res['message']="Not Updated";
    }
    $jsondata = json_encode($res);

    echo $jsondata;

?>