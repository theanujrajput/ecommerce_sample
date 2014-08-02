<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/22/14
 * Time: 4:28 PM
 */

namespace services\Validators;

class AttributeValidator extends Validator
{

    public static $rules = array(

        'name' => 'required|unique:attributes,name',
        'code' => 'required|unique:attributes,code',
        'attribute_category' => 'required',
        'description' => 'required',
        'comparable' => 'required',
        'filterable' => 'required',
        'attribute_value_type' => 'required',
        'active' => 'required',
        'sequence' => 'required',
    );

} 