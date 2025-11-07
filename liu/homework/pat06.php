<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生分數表</title>
    <style>
        div{
            border: 1px solid #000;
            width: 60%; 
            margin-left: auto; 
            margin-right: auto;
            padding: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%; 
            text-align: center;
        }
        th, td {
            border: 1px solid #000; 
            padding: 8px;
        }
        th {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
 <div>
    <table>
    <?php
    $headers = ['', '國文', '英文', '數學', '地理', '歷史']; 
    $students = [
        'judy'  => [95, 64, 70, 90, 84],
        'amo'   => [88, 78, 54, 81, 71],
        'john'  => [45, 60, 68, 70, 62],
        'peter' => [59, 32, 77, 54, 42],
        'hebe'  => [71, 62, 80, 62, 64],
    ]; 
    ?>    
        <tr>
        <?php
        foreach ($headers as $header) {
            echo "<th>" . $header . "</th>";
        }
        ?>
        </tr>
    <?php
        foreach ($students as $name => $scores) {
        echo '<tr>';
        echo '<td>' . $name . '</td>';
            foreach ($scores as $score) {
                echo '<td>' . $score . '</td>';
            }
        
        echo '</tr>';
    }
    ?>
   
    </table>    
 </div>
</body>
</html>