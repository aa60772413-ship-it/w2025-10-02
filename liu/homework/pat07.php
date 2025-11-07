<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $latto=[];
    $powerspc=rand(1,8);
    $lattocount=0;
    while ($lattocount<6) {
        $num=rand(1,38);
            if(in_array($num, $latto)){
                continue;
            }else{
                $latto[]= $num;
                $lattocount ++;
            }              
    }
    sort($latto);
    echo "<h2>本期威力彩選號結果</h2>";
    foreach($latto as $lattos){
        echo $lattos;
        echo"<br>";
    }
    echo "特別號為".$powerspc;
    ?>
</body>
</html>