<?php

class Combo extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function products()
    {
        return $this->belongsToMany('product', 'combo_products')->withPivot('combo_price')->withTimestamps();
    }

}
