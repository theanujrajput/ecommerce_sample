<?php

class Image extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function products()
    {
        return $this->belongsToMany('product', 'productimages')
            ->withPivot(array('name', 'title', 'caption', 'notes', 'is_primary'))->withTimestamps();
    }
}
