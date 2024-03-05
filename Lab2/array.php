<?php
$arr = [
    [1,4,6,7,9,4],
    ['one', 'two'],
    ['key', 6, 'gold']
];
foreach($arr as $ar){
    foreach($ar as $a){
        echo $a.'.';
    }
    echo '<br>';
}

echo '<br>---------------------<br>';


function compare ($x, $y){
    if ($x[1] == $y[1]) return 0;
    else if ($x[1] > $y[1]) return 0;
    else return 1;
}

usort ($arr, "compare");
foreach($arr as $ar){
    foreach($ar as $a){
        echo $a.'.';
    }
    echo '<br>';
}

echo '<br>---------------------<br>';

$m2[0] = 'blue';
$m2[1] = 'green';

$count = count($m2);
for ($i=0; $i < $count; $i++){
    echo $i.' '.$m2[$i].'<br>';
}

echo '<br>---------------------<br>';


$M[0]=100;

$M[1]=200;

$M['red']='красный';

$M[3]=NULL;

$M[4]=FALSE;

$M[5]='';

$M[8]=300;

foreach ($M as $key=>$value){
    echo $key.'=>'.$value.'<br>';
}

// echo '<br>---------------------<br>';
//     var_dump($m2);
// echo '<br>---------------------<br>';
//     var_dump(array_merge($M, $m2));


    $arr1 = [5,4,3,2,1];
    $arr2 = ['one', 'two', 'three', 'four', 'five'];
    var_dump(array_combine($arr1, $arr2));




?>