<?php

$start = microtime(true);

$prev = md5(0);
for ($i = 1; $i <= 50; $i++) {
    for ($j = 1; $j <= 10000; $j++) {
        $cur = md5($j);
        $result = $cur . $prev;
        $result = strtoupper($result);
        $result = substr($result, 16, 32);
        $prev = $cur;
    }
}

$end = microtime(true);
printf('%f sec.', $end - $start);
