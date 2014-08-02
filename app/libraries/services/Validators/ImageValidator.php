<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/5/14
 * Time: 11:17 AM
 */

namespace services\Validators;


class ImageValidator extends Validator
{
    public static $rules = array(
        'name' => 'required',
        'title' => 'required',
        'caption' => 'required',
        'img' => 'required|mimes:jpeg,jpg,png'
    );

} 