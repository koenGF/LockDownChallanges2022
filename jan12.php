<?php
$input = [4, 3, 2, -2, -3, 5, 7, -6];
sort($input);

foreach($input as $value) {
    if ($value > 0) {break;}

    if (array_search($value * -1, $input)) {
        $input = array_diff($input, [$value, $value * -1]);
    }
}

foreach ($input as $value) {
    echo $value . "<br>";
}