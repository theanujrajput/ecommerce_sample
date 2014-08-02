<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/2/14
 * Time: 1:31 PM
 */

class EloquentImageRepository implements iImageRepository
{


    public function createImage($name, $title, $caption, $path)
    {
        try {
            $image = new Image;
            $image->name = $name;
            $image->title = $title;
            $image->caption = $caption;
            $image->path = $path;
            $image->save();
            return $image;

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    public function deleteImage($id)
    {
        try {
            Image::find($id)->delete();

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }
} 