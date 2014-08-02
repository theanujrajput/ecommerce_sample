<?php

class Video extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function categories()
    {
        return $this->belongsToMany('category', 'categoryvideos')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany('product', 'productvideos')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }
}
