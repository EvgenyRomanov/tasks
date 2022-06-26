<?php

// Нужно вывести лесенкой числа от 1 до 100.
// 1
// 2 3
// 4 5 6
// ...

function task1() {
    $limit = 100;

    for ($i = 1, $step = 1; $i <= $limit; ) {
        for ($j = 0; $j < $step && $i <= $limit; $i++, $j++) {
            echo $i . " ";
        }
        $step += 1;
        echo "\n";
    }
}


// Нужно заполнить массив 5 на 7 случайными уникальными числами от 1 до 1000.
// Вывести получившийся массив и суммы по строкам и по столбцам.

function key_exists_in_array($key, $array) {
    foreach($array as $elem) {
        if (in_array($key, $elem)) {
            return true;
        }
    }
    return false;
}

function task2() {

    $row = 5; 
    $column = 7;
    $array = [];
    $sum_column = array_fill(0, $column, 0);
    
    for ($i = 0; $i < $row; $i++) {
    
        $sum_row = 0;
    
        for ($j = 0; $j < $column; $j++) {
    
            $num_rund = random_int(1, 1000);

            while (key_exists_in_array($num_rund, $array)) {
                $num_rund = random_int(1, 1000);
            }

            $array[$i][$j] = $num_rund;
            $sum_row += $array[$i][$j];
            $sum_column[$j] += $array[$i][$j];
    
            printf("%-6s", $array[$i][$j]);
        }
    
        echo "| $sum_row";
        echo "\n";
    
        if ($i === ($row - 1)) {
            echo str_repeat(sprintf("%-6s", " - "), $column);
            echo "\n";
            foreach($sum_column as $elem) {
                printf("%-5s ", $elem);
            }
        }
    }
}


task1();
echo "\n";
task2();
