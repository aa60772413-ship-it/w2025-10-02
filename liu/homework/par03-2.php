<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
           border: 1px solid black;
           padding:10px;
           width:fit-content ;
        }
        table{
            border:1px solid #666;
            padding:5px;
        }
        td{
            padding:3px 6px;
            border:1px solid #7e7e7eff;
        }
    </style>
</head>
<body>
<div>
    <table>
<?php
for($i=1;$i<=10;$i++){
    echo "<tr>";
    for ($j=1; $j<= 10 ; $j++) {
        if($i==1 &&$j==1){
          echo "<td>";
           echo "</td>"  ;
        }elseif($i==1){
            echo "<td>";
            echo $j-$i;
            echo "</td>" ;
        }elseif ($j==1) {
            echo "<td>";
            echo $i-1;
            echo "</td>" ;
        }else{
            echo "<td>";
            echo ($j-1)*($i-1);
            echo "</td>" ;
        }
    }
    echo"</tr>";
}
?>

    </table>
</div>

</body>
</html>