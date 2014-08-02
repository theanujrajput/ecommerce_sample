<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/5/14
 * Time: 11:18 AM
 */

namespace services\Validators;


class VideoValidator extends Validator
{
    public static $rules = array(
        'name' => 'required',
        'title' => 'required',
        'label' => 'required',
        'file' => 'required|mimes:mp4,flv,mkv,mov,avi',
        'active'=>'required'
    );
} 