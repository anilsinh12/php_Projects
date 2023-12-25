 <?php
    $conn = mysqli_connect("localhost","root","","d_b");

    $name = $_POST['name'];

    $sql = "insert into category(name) values('$name')";

    $result = mysqli_query($conn,$sql);

    if($result){
        $res['status'] = 1;
        $res['message'] = "Insertred";
    }else{
        $res['status']=0;
        $res['message']="Not Inserted";
    }
    $jsondata = json_encode($res);

    echo $jsondata;

?>