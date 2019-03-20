<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/20/2019
 * Time: 11:25
 */

namespace shard;
use shard\ShardingStragegy;



class OrderStorage
{
    protected function runQuery($query, Order $order) {
        mysqli_query($query, ShardingStragegy::getInstance()->getConnection($order));
    }

    public function insert(Order $order) {
        //добавить запись и вернуть объект с id
        $this->runQuery("insert lalalal", $order);
        return mysqli_insert_id();
    }

    public function update(Order $order) {
        //обновить объект
        $this->runQuery("update lalala", $order);
    }

    public function delete(Order $order) {
        //удалить объект
        $this->runQuery("delete lalalal", $order);
    }
}