<?php
//print_r($Rules);

/*
for($i=0;$i<=count($Rules);$i++){
    print_r($Rules[$i]['antecedent']);
    print_r($Rules[$i]['consequent']);
    print_r($Rules[$i]['support']);
    print_r($Rules[$i]['confidence']);
}
*/
$cacah = 1;
echo "<hr>";
foreach($Rules as $value){

    $antesenden = $value['antecedent'];
    $cacahantesenden = 1;
    foreach($antesenden as $v1){
        echo $cacah.". Antesenden (".$cacahantesenden.") = ".$v1."<br>";
    }

    $cacahconsequent = 1;
    $consequent = $value['consequent'];
    foreach($consequent as $v2){
        echo $cacah.". Consequent (".$cacahconsequent.") = ".$v2."<br>";
    }
    echo $cacah.". Support = ".$value['support']."<br>";
    echo $cacah.". Confidence = ".$value['confidence']."<br>";

    echo "<hr>";
    $cacah++;
  }
?>

