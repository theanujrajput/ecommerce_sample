<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 12/31/13
 * Time: 4:06 PM
 */

interface iAttributeRepository
{

    public function createAttribute($name, $code, $attribute_category, $description, $category_id, $is_comparable, $is_filterable,
                                    $attribute_value_type, $options, $active, $sequence);

    public function getAttributes($category_id, $name = null, $is_comparable = null, $is_filterable = null, $attribute_value_type = null);

    public function getAttribute($id,$code);

    public function updateAttribute($id, $name, $code, $attribute_category, $description, $category_id, $is_comparable
        , $is_filterable, $attribute_value_type, $options, $active, $sequence);

    public function deleteAttribute($id);


}