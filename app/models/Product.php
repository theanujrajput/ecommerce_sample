<?php

class Product extends Eloquent
{
    protected $guarded = array();

    public static $rules = array();

    public function category()
    {
        return $this->belongsTo('category');
    }

    public function attributes()
    {
        return $this->belongsToMany('attribute', 'productattributes')->withPivot(array('notes', 'value'))->withTimestamps();
    }

    public function images()
    {
        return $this->belongsToMany('image', 'productimages')
            ->withPivot(array('name', 'title', 'caption', 'notes', 'is_primary'))->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('tag', 'producttags')->orderBy('created_at', 'desc')->withPivot('offer_price')->withTimestamps();
    }

    public function documents()
    {
        return $this->belongsToMany('document', 'productdocuments')->orderBy('created_at', 'desc')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }

    public function videos()
    {
        return $this->belongsToMany('video', 'productvideos')->orderBy('created_at', 'desc')->withPivot('name', 'title', 'label', 'notes')->withTimestamps();
    }

    public function productSpecificAttributes()
    {
        return $this->hasMany("productspecificattribute");
    }

    public function combos()
    {
        return $this->belongsToMany('combo', 'combo_products')->withPivot('combo_price')->withTimestamps();
    }
}
