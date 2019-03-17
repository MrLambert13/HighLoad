<?php

if (extension_loaded('xhprof')) {
    $profilerNamespace = 'ЗДЕСЬ_ИМЯ_ПРОФИЛИРУЕМОГО_СКРИПТА';
    $xhprofData = xhprof_disable();
    $xhprofRuns = new XHProfRuns_Default();
    $runId = $xhprofRuns->save_run($xhprofData, $profilerNamespace);
}