<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str="東北季風再度增強，中央氣象署表示，台灣附近水氣仍多，降雨以東北風迎風面的北部及宜蘭地區為主，今（26日）晚8時55分續發6縣市「大雨特報」，因對流雲系發展旺盛及東北季風影響，易有短延時強降雨，高雄市、台北市山區及基隆北海岸、新北汐止、宜蘭地區有局部大雨發生機率。氣象署指出，明天（27日）東北季風影響，北部及東北部天氣稍涼，其他地區早晚涼；桃園以北及東半部地區有局部短暫雨，其中基隆北海岸、大台北山區、宜蘭地區越晚雨勢越大，其他地區為多雲天氣，午後中南部山區有局部短暫陣雨。氣溫方面，北部及宜蘭整天濕涼，氣溫21至25度，其他地區早晚偏涼，低溫約23度。";
    $search="水氣";
    $searchlen=mb_strlen($search);
    $strlen=mb_strlen($str);
    // echo mb_substr($str,0,2,"UTF-8");
    // echo mb_strlen($str);
    $count=0;
    $found=0;
    while($count<$strlen){
        if (mb_substr($str,$count,$searchlen,"UTF-8")== $search){
             echo "找到'{$search}'於位置: ".$count."<br>";
            $found=1;}
        $count++;
    }
    if(!$found){
        echo "找不到".$search;
    }
    ?>
</body>
</html>