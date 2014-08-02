<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/7/14
 * Time: 4:18 PM
 */

class OrderItem extends Eloquent
{

    public function order()
    {
        $this->belongsTo('order');
    }

} 