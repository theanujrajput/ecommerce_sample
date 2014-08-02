<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/13/14
 * Time: 1:35 PM
 */

class Role extends Eloquent
{

    public function users()
    {
        return $this->belongsToMany('user', 'user_roles');
    }

} 