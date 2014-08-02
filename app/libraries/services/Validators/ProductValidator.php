<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/22/14
 * Time: 3:50 PM
 */

namespace services\Validators;

class ProductValidator extends Validator
{

    public static $rules = array(

        'name' => 'required|unique:products,name',
        'code' => 'required|unique:products,code',
        'shortcode' => 'required|unique:products,shortcode',
        'description' => 'required',
        'description_secondary' => 'required',
        'category' => 'required',
        'active' => 'required',
        'list_price' => 'required|numeric',
        'offer_price' => 'required|numeric',
        'weight' => 'required|numeric',
        'warranty' => 'numeric',
        'sequence' => 'required',
    );

} 