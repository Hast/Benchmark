<?php

$start = microtime(true);

for ($i = 1; $i <= 1000; $i++) {
    $array = [];
    for ($j = 1; $j <= 1000; $j++) {
        $array[] = md5($j);
    }

    sort($array);
    $array = array_slice($array, 250, 500);
}

$end = microtime(true);
printf('%f sec.', $end - $start);