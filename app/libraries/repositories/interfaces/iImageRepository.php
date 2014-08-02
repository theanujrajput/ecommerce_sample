<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/2/14
 * Time: 12:32 PM
 */
interface iImageRepository
{

    public function createImage($name, $title, $caption, $path);

    public function deleteImage($id);

}