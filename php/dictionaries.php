<?php

$start = microtime(true);

for ($i = 1; $i <= 1000; $i++) {
    $dict = [];
    for ($j = 1; $j <= 1000; $j++) {
        $dict[md5($j)] = $j;
    }

    ksort($dict);
}

$end = microtime(true);
printf('%f sec.', $end - $start);