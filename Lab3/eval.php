<?php
    $f = 'sin';
    $x = 30;
    eval("\$z = $f($x/180*pi());");
    // echo $z;

    if ($_GET){
        foreach($_GET as $key=>$value){
            // eval("\$$key = '$value';");
            $$key="'$value'";
        }
        echo "Фамилия $fio, оклад $x";
    }

    if (!empty($_GET['x'])){
        $VEK = $_GET['x'];
    }
    $XVI="Иван Васильевич";

    $XVIII="Пётр Алексеевич";

    $XIX="Николай Павлович";

    echo 'В '.$vek.' веке царствовал '.$vvek