<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 月曆 - 完整教學</title>
    <style>
        body {
            font-family: 'Microsoft JhengHei', Arial, sans-serif;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .section {
            background: white;
            padding: 25px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        h2 {
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        
        h3 {
            color: #764ba2;
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        th {
            background: #667eea;
            color: white;
            padding: 15px;
            font-size: 18px;
        }
        
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-size: 16px;
            background: white;
        }
        
        td.empty {
            background: #f5f5f5;
        }
        
        td.today {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }
        
        td.sunday {
            color: #e74c3c;
            font-weight: bold;
        }
        
        td.saturday {
            color: #3498db;
            font-weight: bold;
        }
        
        .code-box {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
            line-height: 1.6;
        }
        
        .highlight {
            background: #fff3cd;
            padding: 2px 8px;
            border-radius: 3px;
            font-weight: bold;
            color: #856404;
        }
        
        .tip {
            background: #e8f4f8;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 15px 0;
        }
        
        .nav-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        
        .nav-buttons a {
            background: #667eea;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .nav-buttons a:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>

<?php
// ============================================
// 步驟 1：基礎設定
// ============================================
date_default_timezone_set('Asia/Taipei');

// 從網址取得年月（如果沒有就用今天）
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('n');

// 處理月份邊界
if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}

// 計算上個月和下個月
$prevMonth = ($month == 1) ? 12 : $month - 1;
$prevYear = ($month == 1) ? $year - 1 : $year;
$nextMonth = ($month == 12) ? 1 : $month + 1;
$nextYear = ($month == 12) ? $year + 1 : $year;

// 取得今天日期（用來標記）
$today = date('Y-m-d');

// ============================================
// 步驟 2：計算月曆資訊
// ============================================
$firstDay = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDay);
$weekday = date('w', $firstDay); // 1號是星期幾
?>

<div class="section">
    <h2>🎯 步驟 1-2：取得基本資訊</h2>
    <p><strong>目標月份：</strong><?php echo $year; ?> 年 <?php echo $month; ?> 月</p>
    <p><strong>這個月有：</strong><?php echo $daysInMonth; ?> 天</p>
    <p><strong>1號是：</strong>星期 <?php echo $weekday; ?>（0=日, 1=一, ..., 6=六）</p>
    <p><strong>今天是：</strong><?php echo $today; ?></p>
    
    <div class="code-box">
<span style="color: #6a9955;">// 從網址取得年月，沒有就用今天</span><br>
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');<br>
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('n');<br><br>

<span style="color: #6a9955;">// 計算關鍵資訊</span><br>
$firstDay = mktime(0, 0, 0, $month, 1, $year);<br>
$daysInMonth = date('t', $firstDay);  <span style="color: #6a9955;">// 該月天數</span><br>
$weekday = date('w', $firstDay);      <span style="color: #6a9955;">// 1號是星期幾</span>
    </div>
</div>

<div class="section">
    <h2>📅 完成品：<?php echo $year; ?> 年 <?php echo $month; ?> 月</h2>
    
    <div class="nav-buttons">
        <a href="?year=<?php echo $prevYear; ?>&month=<?php echo $prevMonth; ?>">◀ 上個月</a>
        <a href="?">回到今天</a>
        <a href="?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>">下個月 ▶</a>
    </div>
    
    <?php
    // ============================================
    // 步驟 3：開始製作月曆表格
    // ============================================
    echo '<table>';
    echo '<tr>
            <th>日</th><th>一</th><th>二</th>
            <th>三</th><th>四</th><th>五</th><th>六</th>
          </tr>';
    
    echo '<tr>';
    
    // ============================================
    // 步驟 4：先印空格（用你的簡單方法）
    // ============================================
    if ($weekday > 0) {
        echo str_repeat('<td class="empty"></td>', $weekday);
    }
    
    // ============================================
    // 步驟 5：印日期（結合兩種優點）
    // ============================================
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // 計算當前日期的完整格式
        $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $day);
        
        // 計算這天是星期幾
        $currentWeekday = ($weekday + $day - 1) % 7;
        
        // 準備 class 屬性（用陣列收集，最後組合）
        $classes = [];
        
        // 判斷 1：是否為今天
        if ($currentDate == $today) {
            $classes[] = 'today';
        }
        
        // 判斷 2：是否為週日
        if ($currentWeekday == 0) {
            $classes[] = 'sunday';
        }
        
        // 判斷 3：是否為週六
        if ($currentWeekday == 6) {
            $classes[] = 'saturday';
        }
        
        // 組合 class 並輸出
        $classAttr = !empty($classes) ? ' class="' . implode(' ', $classes) . '"' : '';
        echo "<td{$classAttr}>{$day}</td>";
        
        // 判斷 4：是否該換行（用你的聰明算法）
        if (($weekday + $day) % 7 == 0) {
            echo '</tr><tr>';
        }
    }
    
    echo '</tr>';
    echo '</table>';
    ?>
</div>

<div class="section">
    <h2>💡 步驟 3-4：印空格（你的簡單方法）</h2>
    
    <div class="code-box">
<span style="color: #6a9955;">// 先印空格（月初前的空位）</span><br>
if ($weekday > 0) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo str_repeat('&lt;td class="empty">&lt;/td>', $weekday);<br>
}
    </div>
    
    <div class="tip">
        <strong>✨ 優點：</strong>一行搞定！<code>str_repeat()</code> 重複印空格，超簡潔。
    </div>
</div>

<div class="section">
    <h2>🎨 步驟 5：印日期（結合兩種優點）</h2>
    
    <h3>核心邏輯：</h3>
    <div class="code-box">
for ($day = 1; $day <= $daysInMonth; $day++) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 計算這天是星期幾</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;$currentWeekday = ($weekday + $day - 1) % 7;<br><br>
    
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 用陣列收集 class（我的結構化方法）</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;$classes = [];<br>
&nbsp;&nbsp;&nbsp;&nbsp;if ($currentDate == $today) $classes[] = 'today';<br>
&nbsp;&nbsp;&nbsp;&nbsp;if ($currentWeekday == 0) $classes[] = 'sunday';<br>
&nbsp;&nbsp;&nbsp;&nbsp;if ($currentWeekday == 6) $classes[] = 'saturday';<br><br>
    
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 輸出</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;td class='" . implode(' ', $classes) . "'>{$day}&lt;/td>";<br><br>
    
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #6a9955;">// 判斷換行（你的簡單算法）</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;if (($weekday + $day) % 7 == 0) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo '&lt;/tr>&lt;tr>';<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
}
    </div>
    
    <h3>關鍵技巧解析：</h3>
    
    <h4>1️⃣ 計算當前是星期幾</h4>
    <div class="code-box">
$currentWeekday = ($weekday + $day - 1) % 7;
    </div>
    <p>
        假設 1 號是星期五（weekday=5）：<br>
        • 1號：(5 + 1 - 1) % 7 = 5（星期五）✓<br>
        • 2號：(5 + 2 - 1) % 7 = 6（星期六）✓<br>
        • 3號：(5 + 3 - 1) % 7 = 0（星期日）✓
    </p>
    
    <h4>2️⃣ 用陣列收集 class（結構化思維）</h4>
    <div class="code-box">
$classes = [];<br>
if ($currentDate == $today) $classes[] = 'today';<br>
if ($currentWeekday == 0) $classes[] = 'sunday';<br>
if ($currentWeekday == 6) $classes[] = 'saturday';
    </div>
    <p class="highlight">好處：可以同時套用多個 class（例如：今天剛好是週日）</p>
    
    <h4>3️⃣ 判斷換行（你的聰明算法）</h4>
    <div class="code-box">
if (($weekday + $day) % 7 == 0) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo '&lt;/tr>&lt;tr>';<br>
}
    </div>
    <p>
        假設 1 號是星期五（weekday=5）：<br>
        • 2號：(5 + 2) % 7 = 0 → 換行！✓<br>
        • 9號：(5 + 9) % 7 = 0 → 換行！✓<br>
        • 16號：(5 + 16) % 7 = 0 → 換行！✓
    </p>
</div>

<div class="section">
    <h2>🏆 結合優點總結</h2>
    
    <table style="width: 100%; margin: 20px 0;">
        <tr>
            <th style="width: 30%;">技巧</th>
            <th style="width: 35%;">來自哪裡</th>
            <th style="width: 35%;">為什麼好</th>
        </tr>
        <tr>
            <td>單層迴圈</td>
            <td>你的方法</td>
            <td>簡單直覺</td>
        </tr>
        <tr>
            <td>str_repeat() 印空格</td>
            <td>你的方法</td>
            <td>一行搞定</td>
        </tr>
        <tr>
            <td>% 7 判斷換行</td>
            <td>你的方法</td>
            <td>算法聰明</td>
        </tr>
        <tr>
            <td>陣列收集 class</td>
            <td>我的方法</td>
            <td>結構清晰，易擴充</td>
        </tr>
        <tr>
            <td>計算星期幾</td>
            <td>我的方法</td>
            <td>可標記週末</td>
        </tr>
        <tr>
            <td>網址參數切換</td>
            <td>我的方法</td>
            <td>可看上/下個月</td>
        </tr>
    </table>
    
    <div class="tip">
        <strong>🎯 最佳實踐：</strong><br>
        • 基礎邏輯用<span class="highlight">單層迴圈</span>（簡單）<br>
        • 判斷功能用<span class="highlight">陣列 + 條件</span>（清晰）<br>
        • 換行判斷用<span class="highlight">% 7 算法</span>（聰明）
    </div>
</div>

</body>
</html>