<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
<body>
    <?php
    $int = "10 + x = 33"
    $element = explode(" ", $int);
    $firstpart = $element[0];
    $x = $element[2];
    $actual_x = NAN;
    $res = $element[4];
    switch ($element[1]) {
        case "+":
            $actual_x = $res - $firstpart;
            break;
        case "-":
            $actual_x = $firstpart - $res;
            break;
        case "/":
            $actual_x = $firstpart / $res;
            break;
        case "*":
            $actual_x = $res / $firstpart;
            break;
        case "**":
            $actual_x = log($res, $firstpart);
            break;
    }
    echo "<h1 style='text-align: center;'>$actual_x</h1>"
    ?>
</body>
</html>