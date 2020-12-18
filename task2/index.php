<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 2 - калькулятор</title>
</head>
<body>
    <form action="index.php" method="GET">
<?php
    $x = $_GET['x'] ?? "";
    $y = $_GET['y'] ?? "";
    $oper = $_GET['oper'] ?? "+";
    if (is_numeric($x) && is_numeric($y)) {
        switch ($oper) {
            case "+":
                $z = $x + $y;
                break;
            case "-":
                $z = $x - $y;
                break;
            case "*":
                $z = $x * $y;
                break;
            case "/":
                if ($y != 0) $z = $x / $y;
                else $z = "деление на 0";
        }
    }
    elseif (($x == "") && ($y == "")) {
        $z = "";
    }
    else {
        $z = "нечисловые аргументы";
    }
?>
        <input type="text" name="x" size="10" value="<?=$x?>">
        <select name="oper">
            <option<?= ($oper == "+") ? " selected" : "" ?>>+</option>
            <option<?= ($oper == "-") ? " selected" : "" ?>>-</option>
            <option<?= ($oper == "*") ? " selected" : "" ?>>*</option>
            <option<?= ($oper == "/") ? " selected" : "" ?>>/</option>
        </select>
        <input type="text" name="y" size="10" value="<?=$y?>">
        <input type="submit" value="=" size="3">
        <span><?=$z?></span>
    </form>
</body>
</html>