<?php
$directions = array(
    'N' => 'North',
    'E' => 'Eart',
    'S' => 'South',
    'W' => 'West'
);
$input = $argv[1];
$input = strtoupper($input);
$x = 0;
$y = 0;

$curr_direction = 'N';
$truc = 'y';
$toantu = '+';
$input_arr = explode('W', $input);

foreach ($input_arr as $item) {
    $int = (int) filter_var($item, FILTER_SANITIZE_NUMBER_INT);

    if($toantu == '+') {
        $$truc = $$truc + $int;
    } else {
        $$truc = $$truc - $int;
    }

    for($i = 0; $i < strlen($item); $i++) {
        if($item[$i] == 'R' || $item[$i] == 'L') {
            $curr_direction = changeDirection($curr_direction, $item[$i]);
            switch ($curr_direction) {
                case 'N':
                    $truc = 'y';
                    $toantu = '+';
                    break;
                case 'E':
                    $truc = 'x';
                    $toantu = '+';
                    break;
                case 'S':
                    $truc = 'y';
                    $toantu = '-';
                    break;
                case 'W':
                    $truc = 'x';
                    $toantu = '-';
                    break;
            }
        }
    }
}

echo "X: " . $x . '. Y: ' . $y . ' Direction: ' . $directions[$curr_direction];


function changeDirection($old, $new) {
    $direction_arr = array(
        0 => 'N',
        1 => 'E',
        2 => 'S',
        3 => 'W'
    );

    $key = array_search($old, $direction_arr);

    if($new == 'R') {
        if($key < 3) {
            return $direction_arr[$key + 1];
        } else {
            return $direction_arr[0];
        }
    }
    if($new == 'L') {
        if($key == 0) {
            return $direction_arr[3];
        } else {
            return $direction_arr[$key - 1];
        }
    }

    return $old;
}
