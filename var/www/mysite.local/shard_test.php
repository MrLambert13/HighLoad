<?php
$db = [
    'user' => 'root',
    'password' => ['123456', ''],
    'host' => ['10.2.2.4', '10.2.2.5'],
    'database' => ['shard_test_1', 'shard_test_2'],
];
function getItem($connection, string $sql) {
    // получение одной строки
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getItemArray($connection, string $sql) {
    // получение нескольких строк
    $result = mysqli_query($connection, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function execute($connection, string $sql) {
    // выполнение запроса (insert, update)
    $result = mysqli_query($connection, $sql);
    return $result;
}

function getLink($id) {
    $link = $id % 2;
    global $db;
    $connection = mysqli_connect(
        $db['host'][$link],
        $db['user'],
        $db['password'][$link],
        $db['database'][$link]
    );

    return $connection;
}

$user_id = 1;
$connection = getLink($user_id);

$time = time();
$request = "INSERT INTO `order` (`name`, `date`, `user_id`, `sum`) VALUES ('Test order 1', {$time}, {$user_id},  '100')";

execute($connection, $request);


$user_id = 2;
$connection = getLink($user_id);

$time = time();
$request = "INSERT INTO `order` (`name`, `date`, `user_id`, `sum`) VALUES ('Test order 2', {$time}, {$user_id}, '2200')";

execute($connection, $request);

var_dump($user_id);
var_dump(getItemArray($connection, 'SELECT * FROM `order`'));