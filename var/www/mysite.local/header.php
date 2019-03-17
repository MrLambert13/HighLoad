<?php

if (extension_loaded('xhprof')) {
    include_once '/var/www/mysite.local/vendor/xhprof-0.9.4/xhprof_lib/utils/xhprof_lib.php';
    include_once '/var/www/mysite.local/vendor/xhprof-0.9.4/xhprof_lib/utils/xhprof_runs.php';
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}