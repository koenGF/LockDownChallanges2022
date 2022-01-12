<?php
$input = [4, 3, 2, -2, -3, 5, 7, -6];
rsort($input);

foreach ($input as $k => $v) {
    if ($v < 0) {break;}

    $minusK = array_search($v * -1, $input);
    if ($minusK) {
        unset($input[$k]);
        unset($input[$minusK]);
    }
}

foreach ($input as $value) {
    echo $value . "<br>";
}