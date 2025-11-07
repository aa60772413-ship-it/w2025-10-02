<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <P>🧩 第 1 步：了解目標</P> 
   我們需要知道某年某月有幾天。
需要知道這個月的 1 號是星期幾（才能對齊）。
然後用一個表格'table'顯示出來。
<P>🪜 第 2 步：先取得「今天日期」與「本月資訊」</P>
<?php
// 設定時區
date_default_timezone_set('Asia/Taipei');
// 取得今年與本月
$year = date('Y');
$month = date('n'); // 不補零
echo "現在是：{$year} 年 {$month} 月<br>";
?>
<P>第 3~4 步：計算關鍵數字</P>
<?php
$daysInMonth = date('t'); // 當月的總天數
echo "這個月有 $daysInMonth 天";
$firstDay = strtotime("$year-$month-01");
$weekday = date('w', $firstDay); // 0=星期日, 6=星期六
echo "這個月的 1 號是星期 $weekday";
?>
<P>第 5 步：用表格畫出月曆的框架</P>
<?php
echo "<table border='1' cellpadding='5'>";
echo "<tr>
        <th>日</th><th>一</th><th>二</th>
        <th>三</th><th>四</th><th>五</th><th>六</th>
      </tr>";
echo "</table>";
?>
<P>🪜 第 6 步：在表格中放入日期</P>
<?php
echo "<table border='1' cellpadding='5'>";
echo "<tr>
        <th>日</th><th>一</th><th>二</th>
        <th>三</th><th>四</th><th>五</th><th>六</th>
      </tr><tr>";
// 空格
if ($weekday > 0) {
    echo str_repeat("<td></td>", $weekday);
}

// 印日期
for ($day = 1; $day <= $daysInMonth; $day++) {
    echo "<td>$day</td>";

    // 每滿 7 天就換行
    if (($weekday + $day) % 7 == 0) {
        echo "</tr><tr>";
    }
}

echo "</tr></table>";
?>


</body>
</html>