<?php
$a = ["Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona", "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda", "Nina", "Ophelia", "Petunia", "Amanda", "Raquel", "Cindy", "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni", "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"];

    $q =$_REQUEST["id"];
    $hint = "";

    if($q !== ""){
        $q = strtolower($q);
        $strlen = strlen($q);

        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $strlen))) {
                if($hint === ""){
                    $hint = $name;
                }else{
                    $hint .= ",$name";
                }
            }
        }

    }

   echo $hint === "" ? "no suggestion" :$hint;


?>
 
 