<?php
require_once('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

const DEBUG = false;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log/my.log', Logger::WARNING));

// add records to the log

if (DEBUG) {
    $log->warning('Foo');
    $log->error('Bar');
} else {
    echo 'Debug mode off';
    phpinfo();
}

