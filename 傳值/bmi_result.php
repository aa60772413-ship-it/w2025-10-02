<?php
if (isset($_GET['height']) && isset($_GET['weight'])) {
    $height = (float)$_GET['height'];
    $weight = (float)$_GET['weight'];
    
    if ($height > 0 && $weight > 0) {
        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        
        if ($bmi < 18.5) {
            $category = "過輕";
        } elseif ($bmi < 25) {
            $category = "正常";
        } elseif ($bmi < 30) {
            $category = "過重";
        } else {
            $category = "肥胖";
        }
        
        echo "<!DOCTYPE html>";
        echo "<html><head><meta charset='UTF-8'><title>BMI結果</title></head><body>";
        echo "<h2>BMI計算結果</h2>";
        echo "<p>你的身高：" . htmlspecialchars($height) . " cm</p>";
        echo "<p>你的體重：" . htmlspecialchars($weight) . " kg</p>";
        echo "<p>你的BMI為：" . round($bmi, 2) . "</p>";
        echo "<p>體型判定為：" . htmlspecialchars($category) . "</p>";
        echo "</body></html>";
    } else {
        echo "身高和體重必須大於0";
    }
} else {
    echo "缺少必要的參數";
}
?>