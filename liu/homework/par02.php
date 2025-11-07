<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    閏年判斷，給定一個西元年份，判斷是否為閏年

地球對太陽的公轉一年的真實時間大約是365天5小時48分46秒，因此以365天定為一年 的狀況下，每年會多出近六小時的時間，所以每隔四年設置一個閏年來消除這多出來的一天。
公元年分除以4不可整除，為平年。
公元年分除以4可整除但除以100不可整除，為閏年。
公元年分除以100可整除但除以400不可整除，為平年。

<?php

function isLeapYear($year) {
    if ($year % 4 !== 0) {
        return false; // 除以4不可整除，是平年
    } elseif ($year % 100 !== 0) {
        return true;  // 除以4可整除但除以100不可整除，是閏年
    } elseif ($year % 400 !== 0) {
        return false; // 除以100可整除但除以400不可整除，是平年
    } else {
        return true;  // 除以400可整除，是閏年
    }
}

// 測試用
$year = 2024;

if (isLeapYear($year)) {
    echo "{$year} 是閏年";
} else {
    echo "{$year} 是平年";
}



?>
</body>
</html>