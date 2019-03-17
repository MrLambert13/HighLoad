<?php

const DEBUG = false;

if (DEBUG) {

    $timeStart = time();
    $startMemory = memory_get_usage();

    for ($i = 0; $i < 10000000; $i++) {
        for ($s = 0; $s < 10; $s++) {

        }
    }

    $endMemory = memory_get_usage();
    $timeEnd = time();

    $deltaT = $timeEnd - $timeStart;
    $deltaM = $endMemory - $startMemory;
    $pid = getmypid();

    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
    Log::_log([$deltaM, $deltaT, $pid]);

} else {
    echo 'Debug mode off';
    phpinfo();
}

$xhprof_data = xhprof_disable();
