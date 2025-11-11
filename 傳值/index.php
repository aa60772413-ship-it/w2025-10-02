<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>網頁傳值練習</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        h1 {
            color: #333;
            margin: 30px 0 15px 0;
            font-size: 24px;
        }
        
        div {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            line-height: 1.6;
            color: #555;
        }
        
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        a:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>

<h1>BMI 計算</h1>

<div>
    建立一個可以輸入身高和體重的表單畫面
    按下"計算BMI"按鈕後，在另一個頁面顯示BMI值
        <a href="bmi.php">前往</a>
</div>
<h1>登入檢查</h1>

<div>
    建立一個可以輸入帳號和密碼的表單畫面
    輸入帳號密碼，按下"登入"按鈕後，在另一個頁面顯示帳號密碼是否正確。
        <a href="login.php">前往</a>
</div>



<h1>設計一個網頁版萬年曆，只需顯示西元年月日</h1>

<div>
    <li>以月為單位來顯示一個月中的日期</li>
    <li>有上一個月，下一個月的連結來切換月份</li>
    <li>可以不同的顏色或樣式來強調當日或周末</li>
    <li>只能使用一個檔案來完成萬年曆的製作</li>

    <a href="calendar.php">前往</a>
</div>
</body>
</html>