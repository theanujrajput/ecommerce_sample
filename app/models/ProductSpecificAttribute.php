<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/8/14
 * Time: 3:00 PM
 */

class ProductSpecificAttribute extends Eloquent
{

    public function product()
    {
        return $this->belongsTo("product");
    }

} 