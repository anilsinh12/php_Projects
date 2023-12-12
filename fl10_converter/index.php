<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converting Currency</title> 
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <center>
         
        <form action="index.php" method="POST">
            <h2>Converting Currency</h2>
            <table>
                <tr>
                    <td>Enter Amount : <input type="text" name="amt" id=""></td>
                </tr>
    
                <tr>
                    <td>
                        from : 
                        <select name="cur1" id="">
                                    <option value="AUD">Australian Dollor(AUD)</option>
                                    <option value="USD" selected>US Dollar(USD)</option>
    
                        </select>
                    </td>
                </tr>
    
                <tr>
                    <td>
                        To : 
                        <select name="cur2" id="">
                            <option value="INR" selected >Indian Rupee(INR)</option>
                            <option value="JPY">Japanese Yen(JPY)</option>
                            <option value="PHP">PHilippine Peso(PHP)</option>
                        </select>
                    </td>
                </tr>
    
                <tr>
                    <td>
                        <center>
                            <input type="submit" name="convert" value="Convert">
                        </center>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td> Your Converted Amount is : <input type="text" id="display" name="display" readonly></td>
                </tr>
                </tr>
            </table>
        </form>
    </center>
    
</body>
</html>

<?php
if(isset($_POST['convert'])){
    $amount = $_POST['amt'];
    $cur1 = $_POST['cur1'];
    $cur2 = $_POST['cur2'];
    $convertedAmount = 0;

    if($cur1 == "AUD" && $cur2 == "INR"){
        $convertedAmount = $amount * 51.09;
    }
    if($cur1 == "AUD" && $cur2 == "JPY"){
        $convertedAmount = $amount * 82.463;
    }
    if($cur1 == "AUD" && $cur2 == "PHP"){
        $convertedAmount = $amount * 37.15;
    }
    if($cur1 == "USD" && $cur2 == "INR"){
        $convertedAmount = $amount * 67.83;
    }
    if($cur1 == "USD" && $cur2 == "JPY"){
        $convertedAmount = $amount * 109.49;
    }
    if($cur1 == "USD" && $cur2 == "PHP"){
        $convertedAmount = $amount * 49.32;
    }

    // Echo the JavaScript to set the value of the display input
    echo '<script>document.getElementById("display").value = "' . $convertedAmount . '";</script>';
}
?>