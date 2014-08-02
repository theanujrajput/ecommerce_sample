<?php

class Document extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function categories()
    {
        return $this->belongsToMany('category','categorydocuments')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany('product','productdocuments')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }
}
