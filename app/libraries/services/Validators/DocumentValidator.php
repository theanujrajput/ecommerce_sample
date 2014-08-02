<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/4/14
 * Time: 11:47 AM
 */

namespace services\Validators;


class DocumentValidator extends Validator
{
    public static $rules = array(
        'name' => 'required',
        'title' => 'required',
        'label' => 'required',
        'file' => 'required|mimes:pdf,doc,docx,csv,txt',
        'active' => 'required',
    );
} 