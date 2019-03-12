<?php
$timeStart = time();
$startMemory = memory_get_usage();

class Log
{
    static function _log($s, $suffix = '') {
        if (is_array($s) || is_object($s)) $s = print_r($s, 1);
        $s = "### " . date("d.m.Y H:i:s") . "\r\n" . $s . "\r\n\r\n\r\n";
        if (mb_strlen($suffix))
            $suffix = "_" . $suffix;
        self::_write($_SERVER['DOCUMENT_ROOT'] . "/_log/logs" . $suffix . ".log", $s, "a+");
        return $s;
    }

    static function _write($fileName, $content, $mode = "w") {
        $dir = mb_substr($fileName, 0, strrpos($fileName, "/"));
        if (!is_dir($dir)) {
            self::_make($dir);
        }
        if ($mode != "r") {
            $fh = fopen($fileName, $mode);
            if (fwrite($fh, $content)) {
                fclose($fh);
                @chmod($fileName, 0775);
                return true;
            }
        }
        return false;
    }

    static function _make($dir, $is_root = true, $root = '') {
        $dir = rtrim($dir, "/");
        if (is_dir($dir)) return true;
        if (mb_strlen($dir) <= mb_strlen($_SERVER['DOCUMENT_ROOT'])) return true;
        if (str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir) == $dir) return true;
        if ($is_root) {
            $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
            $root = $_SERVER['DOCUMENT_ROOT'];
        }
        $dir_parts = explode("/", $dir);
        foreach ($dir_parts as $step => $value) {
            if ($value != '') {
                $root = $root . "/" . $value;
                if (!is_dir($root)) {
                    mkdir($root, 0755);
                    chmod($root, 0755);
                }
            }
        }
        return $root;
    }
}

for ($i = 0; $i < 10000000; $i++) {
    for ($s = 0; $s < 10; $s++) {

    }
}
$endMemory = memory_get_usage();

$timeEnd = time();
$a = $endMemory - $startMemory;
Log::_log($a);
