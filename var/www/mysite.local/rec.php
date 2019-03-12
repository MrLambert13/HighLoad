<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$i = 0;
function recursion($var) {
    recursion(++$var);
}

recursion($i);
