<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    將”this,is,a,book”依”,”切割後成為陣列
    <?php
    $str="this,is,a,book”依";
    $ns=explode(",",$str);
    print_r( $ns);
    
    
    ?>
    將上例陣列重新組合成“this is a book”
    <?php
    $pre=join(" ",$ns);
    echo $pre;
    
    ?>
   將” The reason why a great man is great is that he resolves to be a great man”只取前十字成為” The reason…”
   <?php
   $sr="The reason why a great man is great is that he res";
    $nS=mb_substr($sr,0,10);
    echo $nS;   
   ?>
   學會PHP網頁
   <?php
$str = "學會PHP網頁程式設計，薪水會加倍，工作會好找";
$sch = "程式設計";
$strN = str_replace($sch, "<span style='font-size:30px;'>$sch</span>", $str);
echo $strN;

   ?>
</body>
</html>