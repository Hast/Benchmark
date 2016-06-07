<?php

$start = microtime(true);

$prev = 1;
for ($i = 1; $i <= 1000; $i++) {
    for ($j = 1; $j <= 10000; $j++) {
        $result = $j * $prev;
        $result = $result + $prev;
        $result = $result - $prev;
        $result = $result / $prev;
        $prev = $j;
    }
}

$end = microtime(true);
printf('%f sec.', $end - $start);
