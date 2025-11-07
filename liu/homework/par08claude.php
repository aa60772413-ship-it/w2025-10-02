<?php
// 步驟 1：設定時區和取得日期資訊
// ============================================
echo "<h2>步驟 1：取得基本資訊</h2>";
date_default_timezone_set('Asia/Taipei');
// 取得今年與本月
$year = date('Y');
$month = date('n'); // 不補零
echo "我們要做：{$year} 年 {$month} 月的月曆<br><br>";
// 步驟 2：計算關鍵數字
// ============================================
echo "<h2>步驟 2：計算關鍵數字</h2>";
// 這個月有幾天？
$daysInMonth =  date('t');;
echo "• 這個月有 {$daysInMonth} 天<br>";
 date('t');
$firstDayOfWeek = date('w', strtotime("$year-$month-01"));
echo "• 1號是星期 {$firstDayOfWeek}（0=日, 1=一, ..., 6=六）<br>";
echo "• 所以前面要空 {$firstDayOfWeek} 格<br><br>";
// 步驟 3：開始輸出 HTML 表格
// ============================================
echo "<h2>步驟 3：開始製作月曆</h2>";
// 先輸出表格開頭
echo '<table border="1" cellpadding="10" style="border-collapse: collapse; text-align: center;">';
// 輸出星期標題列
echo '<tr style="background-color: #667eea; color: white;">';
echo '<th>日</th><th>一</th><th>二</th><th>三</th>
<th>四</th><th>五</th><th>六</th></tr>';

// ============================================
// 步驟 4：計算需要幾列
// ============================================
echo "<!-- 步驟 4：計算需要幾列 -->\n";

$totalCells = $firstDayOfWeek + $daysInMonth;
$totalRows = ceil($totalCells / 7);

echo "<!-- 總共需要 {$totalCells} 格 -->\n";
echo "<!-- 需要 {$totalRows} 列 -->\n";

// ============================================
// 步驟 5：用雙層迴圈製作表格內容
// ============================================
echo "<!-- 步驟 5：開始逐格填入 -->\n";

$dayCounter = 1; // 日期計數器，從 1 開始

// 外層迴圈：控制「列」
for ($row = 0; $row < $totalRows; $row++) {
    echo '<tr>';
    
    // 內層迴圈：控制「欄」（一列有 7 欄）
    for ($col = 0; $col < 7; $col++) {
        // 計算這是第幾格（從 0 開始）
        $cellNumber = $row * 7 + $col;
        
        // ============================================
        // 步驟 6：判斷每格要放什麼
        // ============================================
        
        if ($cellNumber < $firstDayOfWeek) {
            // 情況 1：月初前的空格
            echo '<td style="background-color: #f0f0f0;"></td>';
            
        } elseif ($dayCounter <= $daysInMonth) {
            // 情況 2：顯示日期
            echo '<td>' . $dayCounter . '</td>';
            $dayCounter++; // 日期+1
            
        } else {
            // 情況 3：月底後的空格
            echo '<td style="background-color: #f0f0f0;"></td>';
        }
    }
    
    echo '</tr>';
}

echo '</table>';

// ============================================
// 步驟 7：顯示程式碼說明
// ============================================
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 月曆教學</title>
    <style>
        body {
            font-family: 'Microsoft JhengHei', Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        
        h2 {
            color: #667eea;
            border-bottom: 2px solid #667eea;
            padding-bottom: 5px;
            margin-top: 30px;
        }
        
        table {
            margin: 20px auto;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .explanation {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .code-block {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
        }
        
        .highlight {
            background: #fff3cd;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="explanation">
        <h1>📚 PHP 月曆完整教學</h1>
        <p>上面就是我們用 PHP 一步步做出來的月曆！讓我解釋每個步驟：</p>
    </div>
    
    <div class="explanation">
        <h2>🔢 步驟 4-5：雙層迴圈的邏輯</h2>
        
        <h3>為什麼要用雙層迴圈？</h3>
        <p>想像你在填格子：</p>
        <ul>
            <li><strong>外層迴圈</strong>（row）：決定現在在第幾「列」</li>
            <li><strong>內層迴圈</strong>（col）：決定現在在第幾「欄」</li>
        </ul>
        
        <div class="code-block">
for ($row = 0; $row < $totalRows; $row++) {  <span style="color: #6a9955;">// 第幾列</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;for ($col = 0; $col < 7; $col++) {  <span style="color: #6a9955;">// 第幾欄（固定7欄）</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 在這裡決定這格要放什麼</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}
        </div>
        
        <h3>$cellNumber 的作用</h3>
        <p>計算「這是第幾格」：</p>
        <div class="code-block">
$cellNumber = $row * 7 + $col;
        </div>
        
        <p>舉例：</p>
        <ul>
            <li>第 0 列第 0 欄：0×7+0 = <span class="highlight">0</span> (第1格)</li>
            <li>第 0 列第 5 欄：0×7+5 = <span class="highlight">5</span> (第6格)</li>
            <li>第 1 列第 0 欄：1×7+0 = <span class="highlight">7</span> (第8格)</li>
        </ul>
    </div>
    
    <div class="explanation">
        <h2>🎯 步驟 6：判斷邏輯（最重要！）</h2>
        
        <div class="code-block">
if ($cellNumber < $firstDayOfWeek) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 情況 1：還沒到 1 號 → 空格</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;echo '&lt;td&gt;&lt;/td&gt;';<br>
}<br>
elseif ($dayCounter <= $daysInMonth) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 情況 2：在月份範圍內 → 顯示日期</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;echo '&lt;td&gt;' . $dayCounter . '&lt;/td&gt;';<br>
&nbsp;&nbsp;&nbsp;&nbsp;$dayCounter++;  <span style="color: #6a9955;">// 日期 +1</span><br>
}<br>
else {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 情況 3：已經超過最後一天 → 空格</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;echo '&lt;td&gt;&lt;/td&gt;';<br>
}
        </div>
        
        <h3>圖解說明（假設1號是星期五）：</h3>
        <table border="1" cellpadding="5" style="margin: 20px auto; text-align: center;">
            <tr>
                <th>格子編號</th>
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
            </tr>
            <tr>
                <th>判斷</th>
                <td>&lt;5</td>
                <td>&lt;5</td>
                <td>&lt;5</td>
                <td>&lt;5</td>
                <td>&lt;5</td>
                <td>≥5</td>
                <td>≥5</td>
            </tr>
            <tr>
                <th>顯示</th>
                <td style="background: #f0f0f0;">空</td>
                <td style="background: #f0f0f0;">空</td>
                <td style="background: #f0f0f0;">空</td>
                <td style="background: #f0f0f0;">空</td>
                <td style="background: #f0f0f0;">空</td>
                <td><strong>1</strong></td>
                <td><strong>2</strong></td>
            </tr>
        </table>
    </div>
    
    <div class="explanation">
        <h2>🎓 關鍵觀念總結</h2>
        <ol style="line-height: 2;">
            <li><strong>date('t', ...)</strong> → 取得該月有幾天</li>
            <li><strong>date('w', ...)</strong> → 取得星期幾（0-6）</li>
            <li><strong>雙層迴圈</strong> → 外層控制列，內層控制欄</li>
            <li><strong>$cellNumber</strong> → 計算這是第幾格</li>
            <li><strong>$dayCounter</strong> → 記錄目前印到第幾天</li>
            <li><strong>if-elseif-else</strong> → 判斷每格要放什麼</li>
        </ol>
    </div>
    
    <div class="explanation">
        <h2>💡 下一步可以做什麼？</h2>
        <ul style="line-height: 2;">
            <li>✅ 標記今天的日期（改變背景色）</li>
            <li>✅ 週日顯示紅色，週六顯示藍色</li>
            <li>✅ 加上「上個月」「下個月」按鈕</li>
            <li>✅ 讓年月可以從網址參數調整</li>
        </ul>
        <p>想繼續學哪一個功能呢？😊</p>
    </div>
</body>
</html>