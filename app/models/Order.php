<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/7/14
 * Time: 4:17 PM
 */

class Order extends Eloquent
{

    public function items()
    {
        return $this->hasMany('orderitem');
    }
} 