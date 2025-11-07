<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生分數表</title>
    <style>
        /* 外框容器樣式：確保表格居中 */
        div {
            border: 1px solid #000;
            width: 60%; 
            margin-left: auto; 
            margin-right: auto;
            padding: 5px; /* 表格與外框之間的間隙 */
            box-sizing: border-box;
        }
        
        /* 表格樣式 */
        table {
            border-collapse: collapse; /* 合併邊框 */
            width: 100%; /* 填滿 div 容器 */
            margin: 0; 
            text-align: center;
        }
        
        /* 單元格樣式 */
        th, td {
            border: 1px solid #000; 
            padding: 8px;
        }
        
        /* 標題行樣式 */
        th {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>

<?php
// 您的原始資料陣列
$student_scores_1 = [
    ['', '國文', '英文', '數學', '地理', '歷史'], // 這是第一行 (索引 0)
    ['judy', 95, 64, 70, 90, 84],
    ['amo', 88, 78, 54, 81, 71],
    ['john', 45, 60, 68, 70, 62],
    ['peter', 59, 32, 77, 54, 42],
    ['hebe', 71, 62, 80, 62, 64],
]; 
?>

<div>
    <table>
    <?php
    // 使用單一個迴圈，同時處理標題和所有數據行
    foreach ($student_scores_1 as $index => $row) {
        // 每開始一個新的 $row (學生或標題) 就開始一個新的表格列 <tr>
        echo '<tr>';
        
        // 判斷：如果 $index 為 0 (即陣列的第一行)，則使用 <th> (標題)
        if ($index === 0) {
            $cell_tag = 'th'; // 標題單元格
        } else {
            $cell_tag = 'td'; // 數據單元格
        }
        
        // 內層迴圈：遍歷該行中的所有數據
        foreach ($row as $cell_data) {
            // 輸出單元格，並使用 $cell_tag 變數來決定是 <th> 還是 <td>
            echo "<{$cell_tag}>" . $cell_data . "</{$cell_tag}>";
        }
        
        echo '</tr>';
    }
    ?>
    </table>    
</div>

</body>
</html>