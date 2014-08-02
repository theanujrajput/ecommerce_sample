<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/23/14
 * Time: 4:58 PM
 */

namespace services\Validators;

class DealerValidator extends Validator
{

    public static $rules = array(
        'name' => 'required',
        'address1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'pincode' => 'required|numeric',
        'mobile' => 'required|numeric'
    );

} 