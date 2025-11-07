<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $date1 = strtotime("2025-11-01");
    $date2 = strtotime("2025-11-03");

    $diff = $date2 - $date1;




    ?>
    生日
    <?php
    $birthday = "1992-12-17";
    //date(格式(年改為今年+原本月日),生日轉秒)=轉成今年的生日
    $birthdayThisYear = date(date("Y") . "-m-d", strtotime($birthday));
    echo  $birthdayThisYear; //檢查年份改沒有
    $today = strtotime("today"); //今天
    $t = strtotime($birthdayThisYear); //今年生日轉秒(比較用)

    if ($t > $today) { //今年生日的秒>今天，代表今年生日還沒過
        echo ($t - $today) / 60 / 60 / 24 . "天";
    } else {
        //反之，今年生日已過，下次生日是明年
        //strtotime可以直接加一年
        echo (strtotime("+1 year", $t) - $today) / 60 / 60 / 24 . "天";
    }
    ?>
</body>

</html>