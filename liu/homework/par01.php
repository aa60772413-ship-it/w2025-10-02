<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
$score = 30;

if ($score <= 59) {
    echo "E";
} elseif ($score <= 69) {
    echo "D";
} elseif ($score <= 79) {
    echo "C";
} elseif ($score <= 89) {
    echo "B";
} else {
    echo "A";
}
?>
</body>

</html>