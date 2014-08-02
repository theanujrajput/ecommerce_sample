<?php

class Category extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function products()
    {
        return $this->hasMany('product');
    }

    public function attributes()
    {
        return $this->hasMany('attribute');
    }

    public function documents()
    {
        return $this->belongsToMany('document', 'categorydocuments')->orderBy('created_at','desc')->withPivot(array('name', 'title', 'label', 'notes'))->withTimestamps();
    }

    public function videos()
    {
        return $this->belongsToMany('video', 'categoryvideos')->orderBy('created_at','desc')->withPivot(array('name', 'title', 'label', 'notes'))->withTimestamps();
    }
}
