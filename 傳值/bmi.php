<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI 計算器</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>BMI 計算器</h1>
    <form method="GET" action="bmi_result.php">
        <div class="form-group">
            <label for="height">身高 (公分):</label>
            <input type="number" id="height" name="height" step="0.1" required>
        </div>
        <div class="form-group">
            <label for="weight">體重 (公斤):</label>
            <input type="number" id="weight" name="weight" step="0.1" required>
        </div>
        <button type="submit">計算BMI</button>
    </form>
</body>
</html>