<?php
$i = 0;
function recursion($var) {
    recursion(++$var);
}

recursion($i);
