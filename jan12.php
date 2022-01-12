<?php
$input = [4, 3, 2, -2, -3, 5, 7];
rsort($input);
$result = [];

foreach($input as $value) {
    if ($value < 0) {break;}

    if (!array_search($value * -1, $input)) {
        array_push($result, $value);
    }
}

if (empty($result)) {echo "no result";} else {
    foreach ($result as $value) {
        echo $value . "<br>";
    }
}

