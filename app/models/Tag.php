<?php

class Tag extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function products()
    {
        return $this->belongsToMany('product','producttags')->withPivot('offer_price')->withTimestamps();
    }
}
