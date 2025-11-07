<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
         font-family: monospace;  
        }
    </style>
</head>
<body>
    <h1>直角</h1>
    <?php

    for($i=0;$i<5;$i++){
        for($j=0;$j<=$i;$j++){
            echo"*";
        }
        echo"<br>";
    }
    ?>
     <h1>正三角</h1>
    <div>
    <?php
    for($i=0;$i<5;$i++){
        for($j=0; $j<4-$i;$j++){
             echo "&nbsp;";
        } 
          for($k=0; $k<2*$i+1; $k++){
        echo "*";
        }
     echo "<br>";            
     }   
     ?>
    </div>
        <h1>菱形</h1>
    <div>
    <?php
    for($i=0;$i<9;$i++){
        if($i>5){
            $t=$t-1;
        }
        for($j=0; $j<4-$i;$j++){
             echo "&nbsp;";
        } 
          for($k=0; $k<2*$i+1; $k++){
        echo "*";
        }
     echo "<br>";            
     }   
     ?>
    </div>
<h2>長方</h2>
<div>
    <?php
    for($i=0;$i<7;$i++){
        for($j=0;$j<7;$j++){
            if($i==0||$i==6||$j==0||$j==6){
             echo"*";
            }else{
                echo"&nbsp;";
            }
        }
        echo"<br>";
    }   
    ?>
</div>
</body>
</html>