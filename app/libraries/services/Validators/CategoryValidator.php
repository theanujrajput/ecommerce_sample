<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/22/14
 * Time: 4:33 PM
 */

namespace services\Validators;


class CategoryValidator extends Validator
{

    public static $rules = array(

        'name' => 'required',
        'shortcode' => 'required|unique:categories,shortcode',
        'description' => 'required',
        'sequence' => 'required',
        'active' => 'required',
        'delivered' => 'required',
        'ltw' => 'required',
        'cod' => 'required',
        'warranty' => 'required|numeric'
    );
} 