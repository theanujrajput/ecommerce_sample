<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/20/14
 * Time: 11:22 AM
 */
class HtmlUtil
{

    public static function getPrimaryImage($images)
    {
        $image_info = null;
        if (isset($images)) {
            foreach ($images as $image) {
                if ($image->pivot->is_primary == 1) {
                    $image_info = $image;
                    break;
                }
            }
            return (!is_null($image_info)) ? $image_info : null;
        } else {
            return null;
        }

    }

    public static function getProductById($product_id)
    {
        $product = Product::where('id', '=', $product_id)->first();
        return isset($product) ? $product : null;
    }

    public static function getCategory($category_id)
    {
        $category = Category::where('id', '=', $category_id)->first();
        return isset($category) ? $category : null;
    }
} 