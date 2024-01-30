<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF=8">
        <meta name="viewport" content="">
        <title>Document</title>
    </head>
    <body>
            <?php
            // echo "<h1> Hello, PHP </h1>";
            $a = 10;
            $b = "20";
            define("pi", 3.14);
            // $x = $a * pi;
            // echo $a+$b;
            // $a = (int)$b;
            // echo gettype ($a);
            // echo "<h2>$a</h2>";
            $x = 3.4;
            $z = 5.8;
            echo '$x = '.floor($x).'$z = '.floor($z).'<br>';
            echo '$x = '.round($x).'$z = '.round($z).'<br>';
            echo '$x = '.ceil($x).'$z = '.ceil($z).'<br>';
            ?>
</body>
</html>