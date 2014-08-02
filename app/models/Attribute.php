<?php

class Attribute extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function category()
    {
        return $this->belongsTo('category');
    }

    public function products()
    {
        return $this->belongsToMany('product', 'productattributes')->withPivot('notes', 'value');
    }

}
