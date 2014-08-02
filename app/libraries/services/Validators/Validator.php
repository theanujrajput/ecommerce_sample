<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/22/14
 * Time: 3:29 PM
 */
namespace services\Validators;
abstract class Validator
{

    protected $input;

    protected $errors;

    public function __construct($input = NULL)
    {
        $this->input = $input ? : \Input::all();
    }

    public function passes()
    {
        $validation = \Validator::make($this->input, static::$rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}