<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/5/14
 * Time: 11:17 AM
 */

namespace services\Validators;


class TagValidator extends Validator
{
    public static $rules = array(
        'name' => 'required|unique:tags,name',
        'code' => 'required|unique:tags,code',
    );

}