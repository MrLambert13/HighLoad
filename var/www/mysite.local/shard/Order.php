<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/20/2019
 * Time: 11:22
 */

namespace shard;


class Order
{
    public $id;
    public $name;
    public $date;
    public $user_id;
    public $sum;

    public function __construct($name, $date, $user_id, $sum) {
        $this->name = $name;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->sum = $sum;
    }
}