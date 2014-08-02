<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/31/13
 * Time: 12:24 PM
 */

class DbUtil
{

    public static function checkDbNotNullValue($var)
    {
        return !is_null($var) && $var != Constants::NULL_VALUE;
    }

    public static function checkDbNullValue($var)
    {
        return !is_null($var) && $var == Constants::NULL_VALUE;
    }
} 